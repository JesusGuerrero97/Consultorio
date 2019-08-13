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
            ->select('tratamiento.id','nombre', 'apellidos','telefono', 'Observaciones')
            ->get();

        $asistira = DB::table('tratamiento')
        ->join('pacientes', 'pacientes.id', '=', 'tratamiento.id_paciente')
        ->join('detalle_tratamientos', 'detalle_tratamientos.id_tratamiento', 'tratamiento.id')
        ->select('tratamiento.id','nombre', 'apellidos','telefono', 'Observaciones', 'Estado')
        ->where('detalle_tratamientos.Estado', '=', 'Asistira')
        ->get();

        $noAsistira = DB::table('tratamiento')
        ->join('pacientes', 'pacientes.id', '=', 'tratamiento.id_paciente')
        ->join('detalle_tratamientos', 'detalle_tratamientos.id_tratamiento', 'tratamiento.id')
        ->select('tratamiento.id','nombre', 'apellidos','telefono', 'Observaciones', 'Estado')
        ->where('detalle_tratamientos.Estado', '=', 'No asistira')
        ->get();

        $pendiente = DB::table('tratamiento')
        ->join('pacientes', 'pacientes.id', '=', 'tratamiento.id_paciente')
        ->join('detalle_tratamientos', 'detalle_tratamientos.id_tratamiento', 'tratamiento.id')
        ->select('tratamiento.id','nombre', 'apellidos','telefono', 'Observaciones', 'Estado')
        ->where('detalle_tratamientos.Estado', '=', 'Pendiente')
        ->get();

        return view('crm', compact('tratamiento', 'asistira', 'noAsistira', 'pendiente'));
    }
}
