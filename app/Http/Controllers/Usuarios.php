<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\User;
use DB;

class Usuarios extends Controller
{
    public function store(Request $request)
    {
    	$data = new User();
    	DB::table('users')->insert(
		['name' => $request->input('name'),
		'email' => $request->input('email'),
		'password' => bcrypt($request->input('contrasena')),
		'tipo' => $request->input('tipo'),
		'status' => $request->input('status')]
    	);
        return $request;     
    }

    public function edit($id)
    {
		$editar = User::find($id);
		return response()->json(json_encode($editar));
	}

    public function update($id, Request $request)
	{
		$data = User::find($id);
		DB::table('users')->insert(
    	['name' => $request->input('name'),
		'email' => $request->input('email'),
		'password' => bcrypt($request->input('contrasena')),
		'tipo' => $request->input('tipo'),
		'status' => $request->input('status')]
    	);
        return $request;        
	}

    public function show()
    {
    	$usuarios = User::all();
    	return view('usuarios', compact('usuarios'));
    }
}
