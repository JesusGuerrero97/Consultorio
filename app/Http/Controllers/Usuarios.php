<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Empleado;

class Usuarios extends Controller
{
    public function store(Request $request)
    {
    	DB::table('users')->insert(
		['name' => $request->input('name'),
		'email' => $request->input('email'),
		'password' => bcrypt($request->input('contrasena')),
		'tipo' => $request->input('tipo'),
		'status' => $request->input('status'),
		'id_empleado' => $request->input('idEmpleado')]
    	);
        return $request;     
    }

    public function update($id, Request $request)
	{   
        DB::table('users')
                ->where('id', '=', $id)
                ->update(['name' => $request->input('name'), 'tipo' => $request->input('tipo'), 'email' => $request->input('email')]);
        return $request;
	}

    public function show()
    {
    	$usuarios = User::all();
    	$empleados = Empleado::all();
    	return view('usuarios', compact('usuarios', 'empleados'));	
    }
}
