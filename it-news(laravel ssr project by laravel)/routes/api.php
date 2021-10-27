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

Route::get("/articles","ItemApiController@index")->name("article.api.index");
Route::get("/articles/{search}","ItemApiController@search")->name("article.api.search");
Route::get("/article/{id}","ItemApiController@show")->name("article.api.show");
Route::post("/article","ItemApiController@store")->name("article.api.store");
Route::delete("/article/{id}","ItemApiController@delete")->name("article.api.delete");
Route::put("/article/{id}","ItemApiController@update")->name("article.api.update");

Route::get("/category/{id}","ItemApiController@baseOnCategory")->name("article.api.baseOnCategory");

Route::apiResource("/category","CategoryApiController");


