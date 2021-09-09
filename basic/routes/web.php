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

Route::get('about', function () {
    return "this is about";
});

Route::get('contact', function () {
    return "this is contact";
});

Route::get('post/{id}', function ($id) {
    return "this is post $id";
});

Route::get('comment/{id?}', function ($id = "default") {
    return "this is comment $id";
});

Route::view("services", "services");
Route::view("about", "about");
Route::view("contact", "contact");
Route::view("test", "test");

Route::get('page/{id}', "PageController@detail")->name("page.detail");

Route::get("dashboard-backup", "DashboardController@index")->name("dashboard-backup.index");
Route::get("dashboard-backup/create", "DashboardController@create")->name("dashboard-backup.create");
Route::get("dashboard-backup/edit", "DashboardController@edit")->name("dashboard-backup.edit");

Route::get("form", "FormController@create")->name("form.create");
Route::post("form", "FormController@store")->name("form.store");
Route::get("form-delete/{id}", "FormController@destroy")->name("form.destroy");
Route::get("from-edit/{id}", "FormController@edit")->name("form.edit");
Route::post("form-update/{id}", "FormController@update")->name("form.update");

Route::resource("san-kyi","SanKyiController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
