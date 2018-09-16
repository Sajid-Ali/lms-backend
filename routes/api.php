<?php

use Illuminate\Http\Request;

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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('test','API\CourseController@index');
Route::get('check',function(){
    return Response()->json(['check'=>'checking']);
});
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'API\UserController@details');
    });
    
