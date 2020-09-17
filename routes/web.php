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

Route::get('/', function () {
    return view('home');
});
Route::get('/tradelogger', 'App\Http\Controllers\TradeloggerController@show');
Route::get('/trade/{slug}', 'App\Http\Controllers\TradeController@show');
Route::get('/token/{slug}', 'App\Http\Controllers\TokenController@show');
Route::get('/tokens', 'App\Http\Controllers\TokenController@showAll');