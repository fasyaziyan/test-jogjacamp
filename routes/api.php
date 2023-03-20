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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/categories', 'Api\CategoryController@index')->name('APIcategories.index');
Route::post('/categories', 'Api\CategoryController@store')->name('APIcategories.store');
Route::get('/categories/{id}', 'Api\CategoryController@show')->name('APIcategories.show');
Route::put('/categories/{id}', 'Api\CategoryController@update')->name('APIcategories.update');
Route::delete('/categories/{id}', 'Api\CategoryController@destroy')->name('APIcategories.destroy');
