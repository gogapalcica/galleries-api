<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
});

Route::get('/galleries', 'GalleryController@index');
Route::get('/galleries/{id}', 'GalleryController@show');
Route::post('galleries','GalleryController@store');
Route::put('galleries/{id}','GalleryController@update');
Route::delete('galleries/{id}','GalleryController@destroy');

Route::get('authors/{id}', 'UserController@show');

Route::post('galleries/{id}/comments','CommentController@store');
Route::delete('galleries/comments/{id}','CommentController@destroy');
