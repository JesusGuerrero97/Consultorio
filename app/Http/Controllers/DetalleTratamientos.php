<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DetalleTratamientos;

use Illuminate\Http\Request;
use App\DetalleTratamiento;

class DetalleTratamientos extends Controller
{
	public function store($id,Request $request)
	{
		$data = new DetalleTratamiento();
		$data->Estado=$request->input('Estado');
		$data->id_tratamiento=$id;

		$data->save();
        return $request->all();  
	}
}
