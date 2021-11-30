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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/datos', 'App\Http\Controllers\DatosController@index');
Route::post('/datos', 'App\Http\Controllers\DatosController@store');
Route::put('/datos/{id}', 'App\Http\Controllers\DatosController@update');
Route::delete('/datos/{id}', 'App\Http\Controllers\DatosController@destroy');