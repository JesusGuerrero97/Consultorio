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
Route::post('/saveDosis','dosis@store');
Route::post('/editDosis','dosis@update');

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
Route::get('/RH_Empleados/{id}', 'empleados@edit');
Route::post('/modificar/{id}', 'empleados@update');
Route::post('/desactivar/{id}', 'empleados@desactivar');
Route::post('/activar/{id}', 'empleados@activar');
//Route::get('/traer', 'empleados@show2');

//RUTAS USUARIOS
Route::get('/usuarios',function(){
    return view('usuarios');
});

//RUTAS DE PROVEEDORES
Route::get('/contacto',function(){
    return view('contacto');
});

Route::get('/tablaProveedor',function(){
    return view('tablaProveedor');
});

Route::get('/tablaProveedor','Proveedores@show');

Route::post('/GuardarPro', 'Proveedores@store');



//TABLA DE REPORTES
Route::get('/reportes',function(){
    return view('reportes');
});

//RUTAS DE CRM
Route::get('/crm',function(){
    return view('crm');
});
Auth::routes();

