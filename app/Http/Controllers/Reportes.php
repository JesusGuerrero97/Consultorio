<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Medicamento;
use App\Empleado;
use App\Paciente;


class Reportes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::all();
        $empleados = Empleado::all();
        $pacientes = Paciente::all();
        return view('reportes', compact('medicamentos','empleados','pacientes'));
    }

    public function reportesmedicamentos()
    {
        //
        $data = Medicamento::all();
        $pdf = PDF::loadView('reportesmedicamentos',['data' => $data]);
        return $pdf->stream();
    }
    
    public function reportesempleados()
    {
        $data = Empleado::all();
        $pdf = PDF::loadView('reportesempleados',['data' => $data]);
        return $pdf->stream();
    }

    public function reportespacientes()
    {
        $data = Paciente::all();
        $pdf = PDF::loadView('reportespacientes',['data' => $data]);
        return $pdf->stream();
    }

}
