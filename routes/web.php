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


Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('/', function () {
		$producto = DB::select(
			"SELECT tp.id_producto, COUNT(1) AS total FROM productos_orden tp GROUP BY tp.id_producto HAVING COUNT(1) > 1 ORDER BY total DESC"
		);
		$nombre = "";
		if(count($producto) > 0){
			$nombre = App\Producto::find($producto[0]->id_producto);
			$nombre = $nombre->nombre;
		}
	    return view('index', compact('producto', 'nombre'));
	});

	/*
	------------------------------------------------------------------------
	|                          ADMIN
	------------------------------------------------------------------------
	*/
	Route::resource('/admin', 'AdminController');
	Route::get('/admin/{id}/delete', 'AdminController@delete');
	Route::get('/admin/{id}/estatus', 'AdminController@estatus');

	/*
	------------------------------------------------------------------------
	|                          CLIENTE
	------------------------------------------------------------------------
	*/
	Route::resource('/clientes', 'ClienteController');
	Route::get('/clientes/{id}/estatus', 'ClienteController@estatus');
	Route::get('/clientes/{cliente}/ordenes', 'ClienteController@ordenes');

	/*
	------------------------------------------------------------------------
	|                          ORDEN
	------------------------------------------------------------------------
	*/
	Route::resource('/ordenes', 'OrdenController');
	Route::get('/ordenes/{id}/zip', 'OrdenController@zip');
	/*
	------------------------------------------------------------------------
	|                          PRODUCTO
	------------------------------------------------------------------------
	*/
	Route::resource('/productos', 'ProductoController');
	/*
	------------------------------------------------------------------------
	|                          PRODUCTO
	------------------------------------------------------------------------
	*/
	Route::resource('/cupones', 'CuponController');

	/*
	------------------------------------------------------------------------
	|                          TEST
	------------------------------------------------------------------------
	*/
	Route::get('/test', 'TestController@test');



});