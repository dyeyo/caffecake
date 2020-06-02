<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logout',  'Auth\LoginController@logout')->name('logout');
Route::get('/referidos',  'ClientContreller@referide')->name('referide');
Route::post('/registro_referidos', 'ClientContreller@create_referide')->name('create_referide');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['middleware' => ['admin']], function () {

    Route::get('/clientes', 'ClientContreller@index')->name('clients');
    Route::put('/cliente/{user}', 'ClientContreller@delete')->name('deleteUser');

    //TARJETA FRECUENTE
    Route::post('/cliente/activar_tarjeta/', 'ClientContreller@activateTarjet')->name('activateTarjet');
    Route::post('/cliente/descuento_referido/', 'ClientContreller@referredDiscount')->name('referredDiscount');

    //VENTAS
    Route::get('/ventas', 'BuyController@index')->name('buys');
    Route::get('/ventas/crear', 'BuyController@create')->name('buys_create');
    Route::post('/ventas/create', 'BuyController@store')->name('buys_store');
    Route::post('/ventas/create_regular', 'BuyController@storeRegular')->name('buys_storeRegular');
    Route::get('/load_buys/{id}', 'BuyController@loadBuys')->name('loadBuys');
    Route::post('/crear_cliente', 'BuyController@createClient')->name('createClient');
    Route::put('/renovacion_codigo/{user}', 'BuyController@codeRenovation')->name('codeRenovation');

  });

  Route::group(['middleware' => ['client']], function () {
    Route::post('/sendemail', 'HomeController@sendEmail')->name('sendemail');
  });
});



