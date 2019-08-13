<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedor;
use App\Contacto;
use DB;
class Proveedores extends Controller
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
        /*$data=new Proveedor();
        $data->empresa=$request->input('empresa');
        $data->direccion=$request->input('direccion');
        $data->telefono=$request->input('telefono');
        $data->save();
        return $request -> all();*/
        DB::table('proveedores')->insert(
            ['empresa' => $request->input('empresa'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono')]
        );
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $proveedores = DB::table('proveedores')->get();
        return view('tablaProveedor', compact('proveedores'));
    }

    public function showContactos()
    {
        $contacto_proveedor = DB::table('contacto_proveedor')->get();
        return view('tablaProveedor', compact('contacto_proveedor'));
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
        $data = new Proveedor();
        if(Proveedor::where('id', '=', $request->input('id'))->update([
            'empresa'   => $request->input('empresa'),
            'direccion' => $request->input('direccion'),
            'telefono'  => $request->input('telefono')
        ])) {
            return 1;
        }
    }

    public function Habilitar(Request $request)
    {
        $data = Proveedor::find($request[0]);
        $data->status = 1;
        $data->save();
        return 1;
        
    }

    public function Deshabilitar(Request $request)
    {
        $data = Proveedor::find($request[0]);
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
