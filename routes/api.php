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
Route::get('class/groups/{id}','UserApiController@class_groups');
Route::get('group/sections/{id}','UserApiController@group_sections');
Route::get('sections/students/{id}','UserApiController@section_students');
Route::get('get/fee/{id}','UserApiController@get_fee');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
