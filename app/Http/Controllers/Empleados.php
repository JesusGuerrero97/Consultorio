<?php

namespace App\Http\Controllers;
use App\http\Controllers\Empleados;

use Illuminate\Http\Request;
use App\Empleado;

class Empleados extends Controller
{
    //Insertar empleados a la base de datos 
    public function store(Request $request)
    {
    	$data = new Empleado();
    	$data->nombre=$request->input('nombre');
    	$data->apellido=$request->input('apellido');
    	$data->direccion=$request->input('direccion');
    	$data->telefono=$request->input('telefono');
    	$data->status=$request->input('estatus');
    	$data->numero_seguro_social=$request->input('numero_seguro_social');

    	$data->save();
        return $request->all();       
    }

    public function show()
    {
    	$empleados = Empleado::all();
    	return view('/empleados', compact('empleados'));
    }

    public function edit($id)
    {
		$editar = Empleado::find($id);
		return response()->json(json_encode($editar));
	}

	public function update($id, Request $request)
	{
		$data = Empleado::find($id);
    	$data->nombre=$request->input('nombre');
    	$data->apellido=$request->input('apellido');
    	$data->direccion=$request->input('direccion');
    	$data->telefono=$request->input('telefono');
    	$data->status=$request->input('estatus');
    	$data->numero_seguro_social=$request->input('numero_seguro_social');

    	$data->save();
        return $request->all();    
	}

	public function desactivar($id, Request $request)
	{
		$data = Empleado::find($id);
		$data->status=$request->input('estatus');

		$data->save();
		return $request->all();
	}
}
