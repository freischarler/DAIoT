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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('client', ClientController::class);
*/

//Route::apiResource('/list', ListController::class);
//Route::apiResource('sensor', SensorController::class);

//Route::apiResource('sensor/{dispositivo_id}', 'SensorController@show');

//Route::apiResource('sensor', 'SensorController@index');
//Route::apiResource('dispositivos', 'DeviceController@index');

Route::post('sensor','SensorController@store');
Route::post('sensor/delete/{id}','SensorController@destroy');
Route::put('sensor/{id}','SensorController@editSensor');
Route::apiResource('sensor', SensorController::class);

Route::post('dispositivo','DeviceController@store');
Route::post('dispositivo/delete/{id}','DeviceController@destroy');
Route::put('dispositivo/{id}','DeviceController@editDevice');
Route::apiResource('dispositivos', DeviceController::class);


Route::get('log', 'LogController@index');
Route::get('log/{dispositivo}', 'LogController@show');