<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Pacientes;
use App\Paciente as Paciente;
use DB; 

class Pacientes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('agregarPac');

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
        DB::table('pacientes')->insert(
            ['nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'fecha_nac' => $request->input('fechaNac'),
            'sexo' => $request->input('sexo'), 
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono')]
            );
            return 1;
    }
    public function solicitar(Request $request)
    {
        $paciente = new Paciente();
        $paciente = $paciente->where('id', '=', $request[0])->first();
        return $paciente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pacientes = DB::table('pacientes')->get();
        return view('pacientes', compact('pacientes'));  
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
