<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DetalleTratamientos;

use Illuminate\Http\Request;
use App\DetalleTratamiento;
use DB;

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

	public function update($id, Request $request)
	{
		 DB::table('detalle_tratamientos')
                ->where('id', '=', $id)
                ->update(['Estado' => $request->input('Estado')]);
        return $request;
	}
}
