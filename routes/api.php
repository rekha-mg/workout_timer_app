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

Route::get('/Fitnessapp', function () {
    return view('home');
});

Route::get('/Fitness', 'App\Http\Controllers\fitnessController@showAll');

Route::get('/Fitness/{id}', 'App\Http\Controllers\fitnessController@showOne');

Route::post('/Fitness', 'App\Http\Controllers\fitnessController@create');

Route::delete('/Fitness/{id}', 'App\Http\Controllers\fitnessController@delete');
