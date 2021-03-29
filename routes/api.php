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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users','App\Http\Controllers\RestController@getUsers');
Route::get('users/{user_id}','App\Http\Controllers\RestController@getUser');
Route::get('users/{user_id}/services/{service_id}/tarifs','App\Http\Controllers\RestController@getCertainRates');
Route::put('users/{user_id}/services/{service_id}/tarifs/{rate_id}','App\Http\Controllers\RestController@update');