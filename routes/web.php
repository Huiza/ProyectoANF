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

Route::get('empresas/ver/{id}', 'EmpresaController@show')->name('ver_empresa');
    
Route::get('empresas/editar/{id}', 'EmpresaController@edit')->name('editar_empresa');
    
Route::put('empresas/actualizar/{id}', 'EmpresaController@update')->name('actualizar_empresa');

Route::delete('empresas/eliminar/{id}', 'EmpresaController@destroy')->name('eliminar_empresa');
    
//RUTAS PARA EL CATÁLOGO

Route::post('catalogo/guardar', 'CatalogoController@store')->name('guardar_catalogo');   
Route::get('catalogo/crear/{id}', 'CatalogoController@create')->name('crear_catalogo'); 

//RUTAS PARA LOS ESTADOS FINANCIEROS

Route::get('estado_financiero/crear/{id}', 'EstadoFinancieroController@create')->name('crear_estado_financiero');
Route::post('estado_financiero/guardar', 'EstadoFinancieroController@store')->name('guardar_estado_financiero');
Route::post('detalle_estado_financiero/guardar/{id}', 'DetalleEstadosFinancierosController@store')->name('guardar_detalle_estado_financiero');
Route::get('balance_general/ver/{id}', 'DetalleEstadosFinancierosController@show')->name('ver_balance_general');
Route::get('estado_resultado/ver/{id}', 'DetalleEstadosFinancierosController@show')->name('ver_estado_resultado');

Route::post('importarBalanceGeneral', 'ImportarExcelController@ImportarBalanceGeneral')->name('balance_general'); 
Route::post('importarEstadoResultado', 'ImportarExcelController@ImportarEstadoResultado')->name('estado_resultado');   
Route::post('importarCatalogoCuentas', 'ImportarExcelController@importarCatalogoCuentas')->name('catalogo_cuentas');  


//RUTAS PARA EL ANÁLISIS VERTICAL
Route::get('analisis_vertical/calcular/{id}', 'AnalisisVerticalController@show')->name('calcular_analisis_vertical');

//RUTAS PARA EL ANÁLISIS HORIZONTAL
Route::get('analisis_horizontal/calcular/{id}', 'AnalisisHorizontalController@show')->name('calcular_analisis_horizontal');

//RUTAS PARA EL CÁLCULO DE RATIOS FINANCIEROS
Route::get('ratios_financieros/calcular/{id}', 'RatioFinancieroController@store')->name('calcular_ratios_financieros');
Route::get('ratios_financieros/ver/{id}', 'RatioFinancieroController@show')->name('ver_ratios_financieros');

