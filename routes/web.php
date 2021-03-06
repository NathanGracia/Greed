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


Route::get('/','App\Http\Controllers\DashboardController@showDashboard');

Route::get('/tradelogger', 'App\Http\Controllers\TradeloggerController@show');
Route::get('/trade/new', 'App\Http\Controllers\TradeController@new');
Route::get('/trade/create', 'App\Http\Controllers\TradeController@create');
Route::get('/trade/edit/{slug}', 'App\Http\Controllers\TradeController@edit');
Route::get('/trade/statusChange/{slug}', 'App\Http\Controllers\TradeController@statusChange');
Route::get('/trade/{slug}', 'App\Http\Controllers\TradeController@show');
Route::get('/trade/update/{slug}', 'App\Http\Controllers\TradeController@update');
Route::get('/trades', 'App\Http\Controllers\TradeController@index');

Route::get('/token/{slug}', 'App\Http\Controllers\TokenController@show');
Route::get('/tokens', 'App\Http\Controllers\TokenController@index');
Route::get('/geckoTokens', 'App\Http\Controllers\GeckoTokenController@index');
Route::get('/addToken/{id}', 'App\Http\Controllers\TokenController@addTokenFormGecko');

Route::get('/deleteToken/{id}', 'App\Http\Controllers\TokenController@delete');
Route::get('/token/favorite/{id}', 'App\Http\Controllers\TokenController@addFavorite');
Route::get('/token/unfavorite/{id}', 'App\Http\Controllers\TokenController@unFavorite');

