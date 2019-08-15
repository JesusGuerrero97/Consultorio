<?php

namespace App\Http\Controllers;
use App\http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Tratamiento;
use DB;

class CRM extends Controller
{
    public function show()
    {
    	$tratamiento = DB::table('tratamiento')
        ->join('pacientes', 'pacientes.id', '=', 'tratamiento.id_paciente')
        ->select('tratamiento.id','nombre','telefono', 'tipo', 'citas', 'total')
        ->where('tratamiento.total', '>=', 1)
        ->get();

        $tratamiento2 = DB::table('tratamiento')
        ->join('pacientes', 'pacientes.id', '=', 'tratamiento.id_paciente')
        ->join('detalle_tratamientos', 'detalle_tratamientos.id_tratamiento', 'tratamiento.id')
        ->select('detalle_tratamientos.id','detalle_tratamientos.id_tratamiento','nombre','telefono', 'tipo', 'Estado', 'detalle_tratamientos.created_at', 'total')
        ->get();

        return view('crm', compact('tratamiento', 'tratamiento2'));
    }
}
