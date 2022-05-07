<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrdenEstatus;
use App\Orden;
use DateTime;
class TestController extends Controller
{
    public function test1(){
    	$server_application_code = 'LARETRATERIA-EC-CLIENT';
        $server_app_key = "DJJPcw4T5beS9iZgHAP4Ps12mO25fO";
        $date = new DateTime();
        $unix_timestamp = $date->getTimestamp();
        $uniq_token_string = $server_app_key.$unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
        //$transaction_id = $orden->pago->transaction_reference;
        $url = 'https://ccapi-stg.paymentez.com/v2/transaction/refund/';
        $data = '{
                    "transaction": {
                        "id": "DF-4553812"
                    }
                }';

        $ch = curl_init($url);

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Auth-Token: ' . $auth_token)));

        $res = curl_exec($ch);
        dd($res);
        curl_close($ch);
        
    }
 
    public function test(){
        return false;
    	$server_application_code = 'LARETRATERIA-EC-CLIENT';
        $server_app_key = "DJJPcw4T5beS9iZgHAP4Ps12mO25fO";
        //DJJPcw4T5beS9iZgHAP4Ps12mO25fO
        $date = new DateTime();
        $unix_timestamp = $date->getTimestamp();
        $uniq_token_string = $server_app_key.$unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
        //$transaction_id = $orden->pago->transaction_reference;
        $url = 'https://ccapi.paymentez.com/v2/transaction/DF-4553812';
        $data = '{
                    "transaction": {
                        "id": "DF-4553812"
                    }
                }';

        $ch = curl_init($url);

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            //CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Auth-Token: ' . $auth_token)));

        $res = curl_exec($ch);
        dd($res);
        curl_close($ch);
        
    }
}
