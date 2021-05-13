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

Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/search', 'PropostaController@search');
    Route::get('propostas/export/', 'PropostaController@export');
    Route::resource('clientes', 'ClienteController');
    Route::resource('propostas', 'PropostaController');
    Route::post('/updatestatus', 'PropostaController@updateStatus');
});
