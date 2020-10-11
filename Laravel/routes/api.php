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
Route::put('sensor/{id}','SensorController@editSensor');
Route::apiResource('sensor', SensorController::class);

Route::apiResource('dispositivos', DeviceController::class);
//Route::get('sensorlog', 'LogController@index');

Route::get('log', 'LogController@index');
Route::get('log/{dispositivo}', 'LogController@show');