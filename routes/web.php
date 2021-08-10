<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');//->name('index');

Route::get('/index', 'AdminController@index')->name('index')->middleware('auth');;

Route::get('/admin/index/data', 'AdminController@index_data')->name('admin.data')->middleware('auth');;
// Route::post('/admin/index/{id}/index_nuevo', 'AdminController@index_nuevo')->name('admin.index_nuevo')->middleware('auth');



// usuario o personal 

Route::get('/personal', 'PersonalController@personal')->name('personal')->middleware('auth');
Route::get('/personal/index/data', 'PersonalController@data')->name('personal.data')->middleware('auth');
Route::post('/personal/index/store', 'PersonalController@store')->name('personal.store')->middleware('auth');
Route::get('/personal/editar/{id}', 'PersonalController@edit')->where(['id' => '[0-9]+'])->name('personal.editar')->middleware(['auth']);
Route::post('/personal/update/{id}', 'PersonalController@update')->where(['id' => '[0-9]+'])->name('personal.update')->middleware(['auth']);
Route::post('/personal/eliminar', 'PersonalController@destroy')->middleware('auth'); 


//ruta de inventario

Route::get('/inventario', 'InventarioController@entrada_productos')->name('inventario')->middleware('auth');
Route::get('/inventario/data/{tipo}', 'InventarioController@data')->name('inventario.data')->middleware('auth');
Route::post('/inventario/ingreso/{tipo}/store', 'InventarioController@store')->name('inventario.store')->middleware('auth');
Route::get('/inventario/ingreso/{id}/{tipo}/editar', 'InventarioController@edit')->name('inventario.edit')->middleware('auth');
Route::post('/inventario/ingreso/{id}/{tipo}/actualizar', 'InventarioController@update')->name('inventario.update')->middleware('auth');
Route::post('/inventario/{tipo}/eliminar', 'InventarioController@destroy')->middleware('auth');

//Route::get('/test/{id}', 'InventarioController@actualizar_cantidad')->name('inventario.actualizar_cantidad')->middleware('auth');

//ruta reportes
Route::get('/reportes/total', 'ReporteController@generar')->name('reportes.total');
Route::get('/reportes/entrada', 'ReporteController@reporte_ingreso')->name('reportes.entrada');
Route::get('/reportes/salida', 'ReporteController@reporte_salida')->name('reportes.salida');
Route::get('/reportes/{id}/entrega', 'ReporteController@reporte_entrega')->name('reportes.entrega');

//entregas

Route::post('/salidas/entrega_n', 'EntregaController@store')->name('nueva_entrega')->middleware('auth');

// Route::post('/admin/entrega/nuevo', 'EntregaController@nuevo')->name('admin.entrega.nuevo')->middleware('auth');
Route::post('/salidas/entrega_p', 'EntregaController@nuevo')->name('entre_n')->middleware('auth');

Route::get('/salidas/entrega/{id}/actualizar', 'EntregaController@index')->name('entrega')->middleware('auth');

Route::post('/salidas/eliminar', 'EntregaController@destroy')->middleware('auth');



Route::get('/search_insumos/{dni}/insumos','HomeController@search_insumos');