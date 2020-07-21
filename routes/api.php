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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/
Route::prefix('admin')->group(function(){
    Route::apiResource('events','Api\Back\EventsController');
});
Route::get('events','Api\Back\EventsController@index' );
Route::post('uplaodFiles', 'Api\EventsController@filesUpload');
