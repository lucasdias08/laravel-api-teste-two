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

Route::post('/client', 'App\Http\Controllers\ClientController@store');
Route::get('/client', 'App\Http\Controllers\ClientController@index')->middleware('jwt.auth');
Route::get('/client/{id}', 'App\Http\Controllers\ClientController@show')->middleware('jwt.auth');;
Route::put('/client/{id}', 'App\Http\Controllers\ClientController@update')->middleware('jwt.auth');;
Route::delete('/client/{id}', 'App\Http\Controllers\ClientController@destroy')->middleware('jwt.auth');;

Route::post('/order', 'App\Http\Controllers\OrderController@store')->middleware('jwt.auth');
Route::get('/order', 'App\Http\Controllers\OrderController@index')->middleware('jwt.auth');
Route::get('/order/{id}', 'App\Http\Controllers\OrderController@show')->middleware('jwt.auth');
Route::put('/order/{id}', 'App\Http\Controllers\OrderController@update')->middleware('jwt.auth');
Route::delete('/order/{id}', 'App\Http\Controllers\OrderController@destroy')->middleware('jwt.auth');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('jwt.auth');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
