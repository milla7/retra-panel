<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use DateTime;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrdenEstatus;

class OrdenController extends Controller
{

    public function index()
    {
        $ordenes = Orden::whereHas('pago')->get();
        
        return view('panel.orden.index', compact('ordenes'));
    }



    public function show($id)
    {
        $orden = Orden::find($id);
        return view('panel.orden.show', compact('orden'));
    }

    public function estatus(Request $request, $id){
        $orden = Orden::find($id);
        $orden->id_estatus = $request->value;
        $orden->save();
        if(($orden->pago->tipo == 4 || $request->value == '4') && $orden->pago->tipo == 1){
            $this->refund($orden);
        }
        Notification::send($orden->cliente, new OrdenEstatus($orden));
        return response()->json([
            'status' => 'success',
            'data' => $orden,
            'msg' => 'success'
        ]);
    }

    public function comentario(Request $request, $id){
        $orden = Orden::find($id);
        $orden->direccion->comentario = $request->value;
        $orden->direccion->save();
        return response()->json([
            'status' => 'success',
            'data' => $orden,
            'msg' => 'success'
        ]);

    }

    public function refund($orden){
        $server_application_code = 'LARETRATERIA-EC-CLIENT';
        $server_app_key = "DJJPcw4T5beS9iZgHAP4Ps12mO25fO";
        $date = new DateTime();
        $unix_timestamp = $date->getTimestamp();
        $uniq_token_string = $server_app_key.$unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
        $transaction_id = $orden->pago->transaction_reference;
        $url = 'https://ccapi.paymentez.com/v2/transaction/DF-4553812';
        $data = '{
                    "transaction": {
                        "id": "'.$transaction_id.'"
                    }
                }';

        $ch = curl_init($url);

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Auth-Token: '. $auth_token)));

        $res = curl_exec($ch);
        curl_close($ch);
        $orden->pago->estatus = 2;
        $orden->pago->save();
    }


}
