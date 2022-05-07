<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Administrador as Admin;
use Illuminate\Support\Facades\Hash;
use App\Envio;

class AdminController extends Controller
{

    public function index(){
        $administradores = Admin::all();
        return view('panel.administrador.index', compact('administradores'));
    }

    public function create(){
        return view('panel.administrador.create');
    }

    public function store(Request $request){
        $data =  $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:administradores',
            'password' => 'required|string|min:6',
        ]);
        $admin = Admin::create($data);
        $admin->password = Hash::make($data['password']);
        $admin->estatus = 1;
        $admin->save();
        return redirect('/admin')->with(['success' => 'El administrador ha sido registrado con exito!']);
    }

    public function delete($id){
        Admin::where('id', $id)->delete();
        return redirect('/admin')->with(['success' => 'El administrador ha sido eliminado con exito!']);
    }

    public function edit($id){
        $admin = Admin::where('id', $id)->first();
        return view('panel.administrador.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::where('id', $id)->first();
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|max:200|unique:administradores,email,'. $id,
        ];
        if($request->password != null){
            $rules['password'] = 'required|string|min:6';
        }
        $data =  $request->validate($rules);

        $admin->nombres = $data['nombres'];
        $admin->apellidos = $data['apellidos'];
        $admin->email = $data['email'];
        if($request->password != null){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return redirect('/admin')->with(['success' => 'El administrador ha sido actualizado con exito!']);
    }

    public function estatus($id){
        $admin = Admin::find($id);
        if( $admin->estatus == 1 ){
            $admin->estatus = 0;
        }else{
            $admin->estatus = 1;
        }
        $admin->save();
        return redirect('/admin')->with(['success' => 'El estatus del administrador ha sido cambiado con exito!']);
    }

}
