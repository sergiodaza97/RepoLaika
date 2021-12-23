<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', 'App\Http\Controllers\DatosController@index');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::Apiresource('/datos', DatosController::class);
Route::get('{any}', function(){
    return view('home');
})->where('any', '.*');

// Route::get('/get_users', function () {
//     $datos = DB::select('call get_users()'); 
//    return view('home')->with('datos', $datos);
//  });