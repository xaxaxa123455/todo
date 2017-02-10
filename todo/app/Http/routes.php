<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get("/user/login", "UserController@showLoginPage");
Route::get("/user/logout", "UserController@logout");
Route::post("/user/login", "UserController@login");
Route::get("/user/register", "UserController@register");
Route::post("/user/register", "UserController@saveUser");

Route::delete("/user/destroy/{id}", "UserController@destroy");

Route::get("/admin/dashboard", "Admin\DashboardController@index");
Route::get("admin/users/suspend/{id}", "UserController@suspend");
Route::get("admin/users/", "UserController@showAll");

Route::get("/dashboard", "ListsController@index");
Route::delete("/dashboard/{id}", "ListsController@destroy");
Route::post("/dashboard", "ListsController@store");

Route::get('/', function() {
    if (Auth::check()) {
        if (Auth::user()->type == 'admin') {
            return Redirect::to("/admin/dashboard");
        }
        return Redirect::to("/dashboard");
    } else {
        return Redirect::to("/user/login");
    }
});