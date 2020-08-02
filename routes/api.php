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
    Route::apiResource('event/category','Api\Back\EventCategoryController');
    Route::apiResource('event/subcategory','Api\Back\EventSubcategoryController');
});
Route::get('/events_and_experiences','Api\Back\EventCategoryController@frontIndex' );
Route::get('/events_and_experiences/{categoryID}','Api\Back\EventsController@handleEventcategory' );
Route::get('/events_and_experiences/{category_id}/{subCategoryID}','Api\Back\EventsController@fetchSubCategoryEvents' );
Route::get('/events_and_experiences/{category_id}/{subCategoryID}/{eventId}','Api\Back\EventsController@show' );
Route::post('uplaodFiles', 'Api\Back\EventsController@filesUpload');
