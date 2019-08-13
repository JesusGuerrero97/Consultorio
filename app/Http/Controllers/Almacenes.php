<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Almacenes;
use App\Almacen as Almacen;
use DB; 

class Almacenes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = DB::table('almacen')->get();
        $proveedores = DB::table('proveedores')->get();
        return view('almacen', compact(['almacenes'],['proveedores'])); 
    }
    public function solicitar(Request $request)
    {
        $almacen = new Almacen();
        $almacen = $almacen->where('id', '=', $request[0])->first();
        return $almacen;
    }
    public function cambiar(Request $request)
    {
        $almacen = new Almacen();
        $almacen = $almacen->where('id', '=', $request[0])->first();
        
        if($almacen->status == 0){
            DB::table('almacen')
                ->where('id', $almacen->id)
                ->update(['status' => 1]);
        }else{
            DB::table('almacen')
                ->where('id', $almacen->id)
                ->update(['status' => 0]);
        } 
        return 1;
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
        DB::table('almacen')->insert(
            ['descripcion' => $request->descripcion,
            'stock' => $request->stock,
            'proveedor' => $request->proveedor,
            'status' => 1]
            );
        return 1;
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
        DB::table('almacen')
                ->where('id', $request->id)
                ->update(['descripcion' => $request->descripcion, 'stock' => $request->stock,
                'proveedor' => $request->proveedor]);

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
