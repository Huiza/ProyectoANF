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
})->middleware('auth');

Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Auth::routes();

Route::middleware(['auth'])->group(function(){

//RUTAS DE USUARIOS
Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('has.permission:users.create');

Route::get('users', 'UserController@index')->name('users.index')
		->middleware('has.permission:users.index');

Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('has.permission:users.create');

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('has.permission:users.edit');

Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('has.permission:users.edit');

Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('has.permission:users.show');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('has.permission:users.destroy');
        

////RUTAS DE PERMISOS
Route::get('user/permissions/{user}', 'permissioncontroller@index')->name('permission.index')
		->middleware('has.permission:permission_user.index');

Route::post('user/permissions/', 'permissioncontroller@store')->name('permission.store')
		->middleware('has.permission:permission_user.create');

Route::post('user/permissions/delete', 'permissioncontroller@destroy')->name('permission.destroy')
		->middleware('has.permission:permission_user.destroy');


//RUTAS PARA LAS EMPRESAS
Route::get('empresas', 'EmpresaController@index')->name('empresas')
->middleware('has.permission:empresas.index');

Route::get('empresas/crear', 'EmpresaController@create')->name('crear_empresa')
->middleware('has.permission:empresas.create');
    
Route::post('empresas/guardar', 'EmpresaController@store')->name('guardar_empresa')
->middleware('has.permission:empresas.create');

Route::get('empresas/ver/{id}', 'EmpresaController@show')->name('ver_empresa')
->middleware('has.permission:empresas.show');
    
Route::get('empresas/editar/{id}', 'EmpresaController@edit')->name('editar_empresa')
->middleware('has.permission:empresas.edit');
    
Route::put('empresas/actualizar/{id}', 'EmpresaController@update')->name('actualizar_empresa')
->middleware('has.permission:empresas.edit');

Route::delete('empresas/eliminar/{id}', 'EmpresaController@destroy')->name('eliminar_empresa')
->middleware('has.permission:empresas.destroy');
Route::get('empresas/buscar', 'EmpresaController@buscar')->name('buscar_empresa');


    
//RUTAS PARA EL CATÁLOGO

Route::post('catalogo/guardar', 'CatalogoController@store')->name('guardar_catalogo')
->middleware('has.permission:catalogo.create');   
Route::get('catalogo/crear/{id}', 'CatalogoController@create')->name('crear_catalogo')
->middleware('has.permission:catalogo.create'); 

//RUTAS PARA LOS ESTADOS FINANCIEROS

Route::get('estado_financiero/crear/{id}', 'EstadoFinancieroController@create')->name('crear_estado_financiero')
->middleware('has.permission:estado_financieros.create');
Route::post('estado_financiero/guardar', 'EstadoFinancieroController@store')->name('guardar_estado_financiero')
->middleware('has.permission:estado_financieros.create');

Route::post('detalle_estado_financiero/guardar/{id}', 'DetalleEstadosFinancierosController@store')->name('guardar_detalle_estado_financiero')
->middleware('has.permission:detalle_estados_financieros.create');

Route::get('estado_financiero/editar/{id}', 'DetalleEstadosFinancierosController@edit')->name('editar_estado_financiero')
->middleware('has.permission:detalle_estados_financieros.edit');
Route::put('estado_financiero/actualizar/{id}', 'DetalleEstadosFinancierosController@update')->name('actualizar_estado_financiero')
->middleware('has.permission:detalle_estados_financieros.edit');
Route::delete('estado_financiero/eliminar/{id}', 'DetalleEstadosFinancierosController@destroy')->name('eliminar_estado_financiero');

Route::get('balance_general/ver/{id}', 'DetalleEstadosFinancierosController@show')->name('ver_balance_general')
->middleware('has.permission:detalle_estados_financieros.show');

Route::get('estado_resultado/ver/{id}', 'DetalleEstadosFinancierosController@show')->name('ver_estado_resultado')
->middleware('has.permission:detalle_estados_financieros.show');
Route::put('empresas/actualizar/{id}', 'EmpresaController@update')->name('actualizar_empresa')
->middleware('has.permission:empresas.edit');

  
Route::post('importarCatalogoCuentas', 'ImportarExcelController@importarCatalogoCuentas')->name('catalogo_cuentas')
->middleware('has.permission:catalogo.create');  


//RUTAS PARA EL ANÁLISIS VERTICAL
Route::get('analisis_vertical/calcular/{id}', 'AnalisisVerticalController@show')->name('calcular_analisis_vertical')
->middleware('auth');
Route::get('analisis_vertical_balance_general/graficos/{id}', 'GraficoController@analisis_vertical_graficos')->name('ver_graficos_analisis_vertical')
->middleware('auth');


//RUTAS PARA EL ANÁLISIS HORIZONTAL
Route::get('analisis_horizontal/calcular/{id}', 'AnalisisHorizontalController@show')->name('calcular_analisis_horizontal')
->middleware('auth');
Route::get('analisis_horizontal/graficos/{id}', 'GraficoController@analisis_horizontal_graficos')->name('ver_graficos_analisis_horizontal')
->middleware('auth');

//RUTAS PARA EL CÁLCULO DE RATIOS FINANCIEROS
Route::get('ratios_financieros/calcular/{id}', 'RatioFinancieroController@store')->name('calcular_ratios_financieros')
->middleware('auth');
Route::get('ratios_financieros/comparar/{id}', 'RatioFinancieroController@comparar')->name('comparar_ratios_financieros')
->middleware('auth');
Route::get('ratios_financieros/graficos/{id}', 'GraficoController@comparacion_ratios_graficos')->name('graficos_ratios_financieros')
->middleware('auth');

//RUTAS PARA LOS REPORTES
Route::get('/reporte_balance_general/{id}','ReporteController@balance_general')->name('reporte_balance_general');
Route::get('/reporte_estado_resultados/{id}','ReporteController@estado_resultados')->name('reporte_estado_resultados');
Route::get('/reporte_analisis_horizontal/{id}','ReporteController@analisis_horizontal')->name('reporte_analisis_horizontal');
Route::get('/reporte_analisis_vertical/{id}','ReporteController@analisis_vertical')->name('reporte_analisis_vertical');
Route::get('/reporte_ratios_financieros/{id}','ReporteController@ratios_financieros')->name('reporte_ratios_financieros');
Route::get('/reporte_comparacion_ratios/{id}','ReporteController@comparacion_ratios')->name('reporte_comparacion_ratios');

//RUTA CALCULADORA DE RATIOS
Route::get('/calculadora_ratios_financieros','CalculadoraController@calcular_ratios')->name('calculadora_ratios');


});