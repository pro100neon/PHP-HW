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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::prefix('group')->group(function () {
Route::group(['prefix' => 'group','middleware' => 'checkApi'], function (){
    Route::get('/test/one', 'TestController@getOne');
    Route::post('/test/one', 'TestController@setOne');
    Route::get('/getTestById/{id}', 'TestController@getTestById');
    Route::get('/getTestByText/{Text}', 'TestController@getTestByText');
});

Route::get('/test', 'TestController@test');
