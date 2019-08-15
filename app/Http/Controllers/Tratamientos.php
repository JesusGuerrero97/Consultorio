<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Tratamientos;
use App\Tratamiento as Tratamiento;

use DB;

class Tratamientos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }
    public function solicitar(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento = $tratamiento->where('id_paciente', '=', $request[0])->first();

        if($tratamiento == null){
            return 0;
        }
        else{
            return $tratamiento;
        }
        
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
    public function store($id, Request $request)
    {
        DB::table('tratamiento')
                ->where('id', '=', $id)
                ->update(['total' => $request->input('total')]);
        return $request;
    }

    public function update($id, Request $request)
    {
        DB::table('tratamiento')
                ->where('id', '=', $id)
                ->update(['total' => $request->input('total')]);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
