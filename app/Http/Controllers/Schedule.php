<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Cita_nuevo;
use App\Empleado;
use App\Paciente;
use App\Proveedor;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Integer;

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
        return response()->json(array('success' => true, 'last_insert_id' => $data->id), 200);
    }
    public function createConsulta(Request $request){
        $data = new \App\Consulta();
        $data->tratamiento = $request->input('tratamiento');
        $data->pago = $request->input('pago');
        $data->id_cita = $request->input('id_cita');
        $data->id_tratamiento = $request->input('id_tratamiento');
        $data->id_empleado = $request->input('id_empleado');

        $data->save();
        return response()->json(array('success' => true, 'last_insert_id' => $data->id), 200);
    }

    public function addCitaKind(Request $request)
    {

        if($request->input('type') === '1') {
            $id = DB::table('cita_nuevo')->insertGetId(
                array('nombre' => $request->input('nombre'), 'telefono' => $request->input('telefono'), 'id_cita' => $request->input('id_cita'))
            );
        } else if($request->input('type') === '2') {
            $id = DB::table('cita_paciente')->insertGetId(
                array('id_paciente' => $request->input('id_paciente'), 'id_cita' => $request->input('id_cita'))
            );
        } else if($request->input('type') === '3') {
            $id = DB::table('cita_proveedor')->insertGetId(
                array('id_proveedor' => $request->input('id_proveedor'), 'id_cita' => $request->input('id_cita'))
            );
        }
////
        return response()->json(array('success' => true, 'last_insert_id' => $id), 200);
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

    public function updateStatus(Request $req) {

        $res = DB::table('citas')->where('id_cita', $req->input('id_cita'))->update(array('status' => $req->input('status')));
        return json_encode($res);
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
    public function getDoctores() {
        $pacientes = Empleado::all();
        $newData = [];

        foreach ($pacientes as $pas) {
            $tempData = new \stdClass();
            $tempData -> id =  $pas -> id_emp;
            $tempData -> name = $pas -> nombre.' '.$pas -> apellido;
            array_push($newData, $tempData);
        }

        return json_encode($newData);
    }
    public function getProvedores() {
        $provedores = Proveedor::all();
//        $pacientes = Paciente::all();
        $newData = [];

        foreach ($provedores as $pro) {
            $tempData = new \stdClass();
            $tempData -> id =  $pro -> id_proveedor;
            $tempData -> name = $pro -> empresa;
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
