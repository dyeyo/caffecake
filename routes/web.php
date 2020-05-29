<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});
Route::get('/logout',  'Auth\LoginController@logout')->name('logout');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['middleware' => ['admin']], function () {

    Route::get('/clientes', 'ClientContreller@index')->name('clients');
    Route::put('/cliente/activarTarjeta/{user}', 'ClientContreller@activateTarjet')->name('activateTarjet');
    Route::put('/cliente/{user}', 'ClientContreller@delete')->name('deleteUser');
    //VENTAS
    Route::get('/ventas', 'BuyController@index')->name('buys');
    Route::post('/ventas/crear', 'BuyController@store')->name('buys_create');
    Route::get('/load_buys/{id}', 'BuyController@loadBuys')->name('loadBuys');
    Route::post('/crear_cliente', 'BuyController@createClient')->name('createClient');
  });

  Route::group(['middleware' => ['client']], function () {

  });
});



