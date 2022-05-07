<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function index(){
    	$productos = Producto::all();
    	return view( 'panel.producto.index', compact('productos') );
    }

    public function edit(Request $request, $id){
        if(is_numeric($request->value)){
            $ciudad = Producto::find($id);
            $ciudad[$request['name']] = $request->value;
            $ciudad->save();
            return response()->json([
                'status' => 'success',
                'msg' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'msg' => 'ingresa un valor numerico'
            ]);
        }
    }
}
