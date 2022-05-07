<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupon;
use Illuminate\Support\Str;

class CuponController extends Controller
{
    public function index(){
    	$cupones = Cupon::all();
    	return view('panel.cupon.index', compact('cupones'));
    }

    public function estatus(Request $request, $id){
    	$cupon = Cupon::find($id);
        $cupon[$request->name] = $request->value;
        $cupon->save();
        return response()->json([
            'status' => 'success',
            'msg' => 'success'
        ]);
    }

    public function store(Request $request){
        $data =  $request->validate([
            'cantidad' => 'required',
            'monto' => 'required',
        ]);

        for ($i = 0; $i < $request->cantidad ; $i++) {
            $data = $this->codigo();
            $cupon = Cupon::create([
                "codigo" => $data,
                "monto" => $request->monto
            ]);

        }
        return redirect('/cupones')->with(['success' => 'Los Cupones fueron creados con exito!']);
    }

    public function codigo(){
        $codigo = Str::random(8);

        return strtoupper($codigo);
    }
}
