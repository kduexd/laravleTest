<?php

use Illuminate\Http\Request;
use App\member;
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


Route::post('v1/user/create', 'memberController@store');
Route::delete('v1/user/delete/{member}', 'memberController@destroy');
Route::post('v1/user/pwd/change/{member}', 'memberController@update');
Route::post('v1/user/login', 'memberController@loginAuth');
Route::get('v1/user/login', 'memberController@getLogin');
