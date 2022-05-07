<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/productos/{id}', 'ProductoController@edit');
Route::post('/ordenes/{id}', 'OrdenController@estatus');
Route::post('/ordenes/{id}/comentario', 'OrdenController@comentario');
Route::post('/cupones/{id}', 'CuponController@estatus');