<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Schedule extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Cita();
        $data->fecha_inicio = $request->input('fecha_inicio');
        $data->fecha_fin = $request->input('fecha_fin');
        $data->tipo = $request->input('tipo');
        $data->descripcion = $request->input('descripcion');
        $data->status = $request->input('status');

        $data->save();
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $citas = Cita::all();
//        $citas = DB::table('citas')->get();
//        return view('citas', compact('citas'));
        return json_encode($citas);
    }

    public function getPacientes() {
        $pacientes = Paciente::all();
        $newData = [];

        foreach ($pacientes as $pas) {
            $tempData = new \stdClass();
            $tempData -> id =  $pas -> id_paciente;
            $tempData -> name = $pas -> nombre;
            array_push($newData, $tempData);
        }

        return json_encode($newData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
