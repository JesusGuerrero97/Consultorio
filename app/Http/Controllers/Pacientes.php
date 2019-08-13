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
            'fechaNac' => $request->input('fechaNac'),
            'sexo' => $request->input('sexo'), 
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono')]
            );
            return 1;
    }
    public function tratamiento(Request $request)
    {
        DB::table('tratamiento')->insert(
            ['tipo' => $request->tipo,
            'pagoini' => $request->pagoini,
            'presu' => $request->presu,
            'citas' => $request->citas, 
            'total' => $request->total,
            'id_paciente' => $request->id_paciente]
            );
            return 1;
    }
    public function solicitar(Request $request)
    {
        $paciente = new Paciente();
        $paciente = $paciente->where('id', '=', $request[0])->first();
        return $paciente;
    }
    public function cambiar(Request $request)
    {
        $pacientes = new Paciente();
        $pacientes = $pacientes->where('id', '=', $request[0])->first();
        
        if($pacientes->status == 0){
            DB::table('pacientes')
                ->where('id', $pacientes->id)
                ->update(['status' => 1]);
        }else{
            DB::table('pacientes')
                ->where('id', $pacientes->id)
                ->update(['status' => 0]);
        } 
        return 1;
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
    public function update(Request $request)
    {
        DB::table('pacientes')
                ->where('id', $request->id)
                ->update(['nombre' => $request->nombre, 'apellido' => $request->apellido,
                'fechaNac' => $request->fechaNac, 'sexo' => $request->sexo, 'direccion' => $request->direccion,
                'telefono' => $request->telefono]);

                return 1;
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
