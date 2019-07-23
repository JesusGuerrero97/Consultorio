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
Route::get('/log',function (){
    return view('login');
});

//RUTAS DE HOME
Route::get('/home',function(){
    return view('home');
});

//RUTAS DE MEDICAMENTOS
Route::get('/medicamentos',function(){
    return view('medicamentos');
});

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
    return view('RH_Empleados');
})->name('Empleados');

Route::get('/Configuracion_Usuarios',function(){
    return view('Configuracion_Usuarios');
});

//RUTAS DE PROVEEDORES
Route::get('/contacto',function(){
    return view('contacto');
});

Route::get('/tablaProveedor',function(){
    return view('tablaProveedor');
});

//TABLA DE REPORTES
Route::get('/reportes',function(){
    return view('reportes');
});