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
    return view('auth/login');
});


// Rutas para Usuario
Route::get('Usuario/usuario/{$us->Id}','UsuarioController@destroy');
Route::resource('Usuario/usuario','UsuarioController');

//Modificar Contraseña Usuario
Route::resource('Pass/pass','passController');

//Ruta para Produccion
Route::resource('Produccion/produccion','ProduccionController');

// Rutas para Device
Route::resource('Device/device','DeviceController');
Route::get('Device/device/{$pr->Id}','DeviceController@destroy');

// Ruta para Autenticar
Route::auth();
Auth::routes();
Route::resource('indexa','adminController');

//Rutas para Reportes
Route::resource('Reportes/ReporteI','ReporteIController');
Route::resource('Reportes/ReporteL','ReporteLController');
Route::resource('Reportes/ReportePF','ReportePFController');
Route::resource('Reportes/ReportePRF','ReportePRFController');
Route::resource('Reportes/ReporteDP','ReporteDPController');

//Rutas PDF
Route::get('Reportes/rIssue','ReporteIController@getPDF');
Route::get('Reportes/rDEspecifico','ReporteDPController@getPDF');
Route::get('Reportes/rLoteD','ReporteLController@getPDF');
Route::get('Reportes/rProcesoF','ReportePFController@getPDF');
Route::get('Reportes/rProcesoRF','ReportePRFController@getPDF');

//
