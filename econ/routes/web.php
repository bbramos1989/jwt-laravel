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

Route::group(array('prefix' => 'api/v1'), function()
{    

    Route::get('users/all', 'UserController@listAll');
    
    Route::post('users/create', 'UserController@create');

    Route::post('auth/login', 'AuthController@authenticate');
   
   //Route::get('vendas-por-vendedor/{id}', 'VendaController@listarPorVendedor');
   //Route::post('venda/create', 'VendaController@create');

});