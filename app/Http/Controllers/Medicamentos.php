<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medicamento;
use DB;

class Medicamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::all();
        $dosis = DB::table('dosis')
        ->join('medicamentos','dosis.id_medicamento','=','medicamentos.id')
        ->select('medicamentos.nombre','dosis.descripcion','dosis.id','dosis.id_medicamento')
        ->get();
        return view('medicamentos',compact('medicamentos','dosis'));
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
        $data = new Medicamento();
    	$data->nombre=$request->input('nombre');
    	$data->descripcion=$request->input('descripcion');
    	$data->cantidad=$request->input('cantidad');
    	$data->save();
        return $request->all(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $data = Medicamento::find($request->input('id'));
    	$data->nombre=$request->input('nombre');
    	$data->descripcion=$request->input('descripcion');
    	$data->cantidad=$request->input('cantidad');
        //$data->status=$request->input('estatus');
        
    	$data->save();
        return $request->all();    
    }
    public function habilitar(Request $request)
    {
        $data = Medicamento::find($request[0]);
        $data->status = 1;
        $data->save();
        return 1;
        
    }

    public function deshabilitar(Request $request)
    {
        $data = Medicamento::find($request[0]);
        $data->status = 0;
        $data->save();
        return 0;
        
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
