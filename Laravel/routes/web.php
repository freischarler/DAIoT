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
/*
Route::get('/clients', function () {
    return view('clients.index');
});*/



    //Route::get('/', "PageController@inicio");
//Route::get('/devices', "PageController@devices");

Route::get('/dispositivos', function () {
    return view('dispositivos.index');
});

Route::get('/sensores', function () {
    return view('sensores.index');
});

Route::get('/log/{id}', function () {
    return view('log.index');
});




Route::get('/', 'PageController@index');
//Route::get('/{any}', 'PageController@index')->where('any', '.*');

Route::get('/mqtt/mqtt', function () {
    return view('mqtt.mqtt');
});

