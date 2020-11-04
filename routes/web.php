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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS PARA LAS EMPRESAS
Route::get('empresas', 'EmpresaController@index')->name('empresas');

Route::get('empresas/crear', 'EmpresaController@create')->name('crear_empresa');
    
Route::post('empresas/guardar', 'EmpresaController@store')->name('guardar_empresa');
    
Route::get('empresas/editar/{id}', 'EmpresaController@edit')->name('editar_empresa');
    
Route::put('empresas/actualizar/{id}', 'EmpresaController@update')->name('actualizar_empresa');
    
//RUTAS PARA EL CATÁLOGO
<<<<<<< HEAD
Route::get('catalogo/crear/{id}', 'CatalogoController@create')->name('crear_catalogo');

Route::post('catalogo/guardar', 'CatalogoController@store')->name('guardar_catalogo');   
=======
Route::get('catalogo/crear/{id}', 'CatalogoController@create')->name('crear_catalogo'); 

Route::post('importarBalanceGeneral', 'ImportarExcelController@ImportarBalanceGeneral')->name('balance_general'); 
Route::post('importarEstadoResultado', 'ImportarExcelController@ImportarEstadoResultado')->name('estado_resultado');   

>>>>>>> ccf5fb43dd78804e4189ef1d16d77d1a63b44a5d
