<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
	public function index(){
		$clientes = Cliente::all();
		return view('panel.cliente.index', compact('clientes'));
	}

	public function estatus($id){
        $cliente = Cliente::find($id);
        if( $cliente->estatus == 1 ){
            $cliente->estatus = 0;
        }else{
            $cliente->estatus = 1;
        }
        $cliente->save();
        return redirect('/clientes')->with(['success' => 'El estatus del Cliente ha sido cambiado con exito!']);
    }

    public function ordenes(Cliente $cliente){
        $ordenes = $cliente->ordenes;
        return view('panel.orden.index', compact('ordenes'));
    }

}
