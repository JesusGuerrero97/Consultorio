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
Route::get('/pacientes',function(){
    return view('pacientes');
});

Route::get('/agregarPac','pacientes@index')	
->name('agregar');

//RUTAS DE ALMACEN
Route::get('/almacen',function(){
    return view('almacen');
});

//RUTAS EMPLEADOS
Route::get('/RH_Empleados',function(){
    return view('empleados');
})->name('Empleados');
Route::post('/save', 'empleados@store');
Route::get('/RH_Empleados', 'empleados@show');
Route::post('/modificar/{id}', 'empleados@update');
Route::post('/desactivar/{id}', 'empleados@desactivar');
Route::post('/activar/{id}', 'empleados@activar');
//Route::get('/traer', 'empleados@show2');

//RUTAS USUARIOS
Route::get('/usuarios',function(){
    return view('usuarios');
});
Route::post('/guardar', 'usuarios@store');
Route::get('/usuarios', 'usuarios@show');

//RUTAS DE PROVEEDORES
Route::get('/contacto',function(){
    return view('contacto');
});

Route::get('/tablaProveedor',function(){
    return view('tablaProveedor');
});

Route::get('/tablaProveedor','Proveedores@show');

Route::post('/GuardarPro', 'Proveedores@store');


//RUTAS DE CRM
Route::get('/crm',function(){
    return view('crm');
});
Auth::routes();

