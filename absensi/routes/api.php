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


Route::get('tmprfid_get', 'RfidController@tmprfid_get');
Route::get('tmprfid_post', 'RfidController@tmprfid_post');
Route::get('mode_get', 'RfidController@mode_get');
Route::get('kehadiran_post', 'RfidController@kehadiran_get');
