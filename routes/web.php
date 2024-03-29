<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//RUTAS DE LOGIN
Route::get('/email',function(){
    return view('auth/passwords/email2');
})->name('email2');

//RUTAS DE HOME
Route::get('/home',function(){
    return view('home');
})->name('home')->middleware('auth');

//RUTAS DE MEDICAMENTOS
Route::get('/medicamentos','medicamentos@index')->name('medicamentos');
Route::post('/saveMedicamento', 'medicamentos@store');
Route::post('/editMedicamento','medicamentos@update');
Route::post('/habilitar','medicamentos@habilitar');
Route::post('/deshabilitar','medicamentos@deshabilitar');
Route::post('/saveDosis','dosis@store');
Route::post('/editDosis','dosis@update');
Route::post('/deleteDosis','dosis@destroy');

//Rutas reporte
Route::get('/reportes','reportes@index')->name('reportes');
Route::get("/reportesmedicamentos", 'reportes@reportesmedicamentos')->name('reportesmedicamentos');
Route::get("/reportesempleados", 'reportes@reportesempleados')->name('reportesempleados');
Route::get("/reportespacientes", 'reportes@reportespacientes')->name('reportespacientes');


//RUTAS DE PACIENTES
Route::get('/pacientes', 'pacientes@show')
->name('pacientes');

Route::get('/agregarPac','pacientes@index')	
->name('agregar');

Route::post('/guardarPac','pacientes@store');

Route::get('/editPac/{id}',function($id)
{
  return view('agregarPac',compact('id'));
})->name('editPac');

Route::post('/mandarPac','pacientes@solicitar');
Route::post('/editarPac','pacientes@update');
Route::post('/cambiarPac', 'pacientes@cambiar');
Route::post('/guardarTrata','pacientes@tratamiento');
Route::post('/solicitarTrata','tratamientos@solicitar');
Route::post('/historial', 'consulta@index')->name('historial');


//RUTAS DE ALMACEN
Route::get('/almacen',function(){
    return view('almacen');
});
Route::get('/almacen', 'almacenes@index')
->name('almacen');

Route::post('/almacenar','almacenes@store');
Route::post('/editar','almacenes@update');
Route::post('/solicitar','almacenes@solicitar')->name('solicitar');
Route::post('/cambiar', 'almacenes@cambiar');

//RUTAS EMPLEADOS
Route::get('/RH_Empleados',function(){
    return view('empleados');
})->name('Empleados');
Route::post('/save', 'empleados@store');
Route::get('/RH_Empleados', 'empleados@show');
Route::post('/modificarEmpleados/{id}', 'empleados@update');
Route::post('/desactivar/{id}', 'empleados@desactivar');
Route::post('/activar/{id}', 'empleados@activar');
//Route::get('/traer', 'empleados@show2');

//RUTAS USUARIOS
Route::get('/usuarios',function(){
    return view('usuarios');
});
Route::post('/guardar', 'usuarios@store');
Route::get('/usuarios', 'usuarios@show');
Route::post('/modificarUsuario/{id}', 'usuarios@update');
Route::post('/desactivar2/{id}', 'usuarios@desactivar');
Route::post('/activar2/{id}', 'usuarios@activar');

//RUTAS DE PROVEEDORES
Route::get('/contacto',function(){
    return view('contacto');
});

Route::get('/tablaProveedor',function(){
    return view('tablaProveedor');
});

Route::get('/tablaProveedor','Proveedores@show');

//Route::get('/tablaProveedor','Contactos@show');

Route::post('/GuardarPro', 'Proveedores@store');

Route::post('/HabilitarPro','Proveedores@Habilitar');

Route::post('/DeshabilitarPro','Proveedores@Deshabilitar');

Route::post('/editProveedor','Proveedores@update');

//RUTAS DE CRM
Route::get('/crm',function(){
    return view('crm');
});
Route::get('/crm', 'crm@show');
Route::post('/guardar/{id}', 'detalleTratamientos@store');
Route::post('/restar/{id}', 'tratamientos@store');
Route::put('/modificar3/{id}', 'detalleTratamientos@update');
Route::post('/restar2/{id}', 'tratamientos@update');
///citas
//RUTAS CALENDARIO DE CITAS
Route::get('/citas',function(){
    return view('schedule');
})->name('citas');
Route::post('/saveCita', 'Schedule@store');
Route::post('/saveConsulta', 'Schedule@createConsulta');
Route::post('/saveCitaKind', 'Schedule@addCitaKind');
Route::get('/citasGet', 'Schedule@show');
Route::get('/getPac', 'Schedule@getPacientes');
Route::get('/getPro', 'Schedule@getProvedores');
Route::get('/getDoc', 'Schedule@getDoctores');
Route::post('/updateState', 'Schedule@updateStatus');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();


