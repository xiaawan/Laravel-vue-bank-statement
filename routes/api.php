<?php

use Illuminate\Http\Request;

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


Route::post('/transactions/create', 'TransactionsController@store');
Route::get('/transactions/edit/{id}', 'TransactionsController@edit');
Route::post('/transactions/update/{id}', 'TransactionsController@update');
Route::delete('/transactions/delete/{id}', 'TransactionsController@delete');
Route::get('/transactions', 'TransactionsController@index');