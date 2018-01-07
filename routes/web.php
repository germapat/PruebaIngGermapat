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


Route::get('/listar/bancos','SoapClientController@bank_list')->name('bank_list');
Route::get('/cliente','SoapClientController@client')->name('client');
Route::get('/cliente/{id}/consultar','SoapClientController@get_client_list')->name('client_list');
Route::get('/cliente/registrar','SoapClientController@get_registre_user')->name('get_registre_user');
