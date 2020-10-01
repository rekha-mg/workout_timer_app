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


Route::get('/fitness', 'App\Http\Controllers\fitnessController@showAll');

Route::get('/fitness_id', 'App\Http\Controllers\fitnessController@maxid');

Route::get('/fitness/{id}', 'App\Http\Controllers\fitnessController@showOne');

Route::post('/fitness', 'App\Http\Controllers\fitnessController@create');

Route::delete('/fitness/{id}', 'App\Http\Controllers\fitnessController@delete');
