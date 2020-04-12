<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
