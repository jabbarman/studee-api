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

Route::apiResource('segment', 'SegmentController')->except([
    'update', 'destroy'
]);
Route::put('segment/{segment}', 'SegmentController@update');
Route::delete('segment/{segment}', 'SegmentController@destroy');

Route::apiResource('family', 'FamilyController')->except([
    'destroy'
]);
Route::delete('family{family}', 'FamilyController@destroy');

Route::apiResource('class', 'CclassController')->except([
    'destroy'
]);
Route::delete('class{class}', 'CclassController@destroy');

Route::apiResource('commodity', 'CommodityController')->except([
    'destroy'
]);
Route::delete('commodity/{commodity}', 'CommodityController@destroy');
