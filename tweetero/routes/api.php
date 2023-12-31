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

Route::post('sign-up', 'App\Http\Controllers\AuthController@signUp');
Route::post('tweet', 'App\Http\Controllers\TwwetController@tweet');
Route::get('tweet', 'App\Http\Controllers\TwwetController@getTweet');