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

Route::get('/home', 'HomeController@index');

//comando Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('comando','\App\Http\Controllers\ComandoController');
  Route::post('comando/{id}/update','\App\Http\Controllers\ComandoController@update');
  Route::get('comando/{id}/delete','\App\Http\Controllers\ComandoController@destroy');
  Route::get('comando/{id}/deleteMsg','\App\Http\Controllers\ComandoController@DeleteMsg');
});


//Route::resource('comandos', 'comandosController');

//Route::resource('comandos', 'comandosController');

//Route::resource('comandos', 'ComandosController');

//Route::resource('comandos', 'ComandosController');

//Route::resource('comandos', 'comandoController');

//tabla Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('tabla','\App\Http\Controllers\TablaController');
  Route::post('tabla/{id}/update','\App\Http\Controllers\TablaController@update');
  Route::get('tabla/{id}/delete','\App\Http\Controllers\TablaController@destroy');
  Route::get('tabla/{id}/deleteMsg','\App\Http\Controllers\TablaController@DeleteMsg');
});


Route::resource('tablas', 'TablasController');