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
});

Auth::routes();

Route::prefix("dashboard")->middleware("auth")->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get("use-phone", "HomeController@usePhone")->middleware('isAdmin')->name("home.usePhone");
    Route::resource("article", "ArticleController");
    Route::get("/search", "ArticleController@search")->name('article.search');

    Route::get("profile", "ProfileController@edit")->name("profile.edit");
    Route::post("profile", "ProfileController@update")->name("profile.update");

    Route::resource("photo", "PhotoController");
    Route::post("profile/change-password", "ProfileController@changePassword")->name("profile.changePassword");
});

Route::get('article', "PageController@index")->name("Page.index");
