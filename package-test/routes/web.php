<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("/");

Route::post("/upload", "PageController@upload")->name("upload");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/facebook', 'FacebookController@redirect')->name("fb.redirect");
Route::get('auth/facebook/callback', 'FacebookController@callback')->name("fb.callback");

Route::get('auth/google', 'GoogleLoginController@redirect')->name("google.redirect");
Route::get('auth/google/callback', 'GoogleLoginController@callback')->name("google.callback");
