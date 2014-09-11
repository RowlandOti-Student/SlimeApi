<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
<<<<<<< HEAD
        return View::make('hello');
});

Route::post("login", [
        "as"   => "auth/login",
        "uses" => "AuthController@postLogin"
]);

Route::post("register", [
        "as"   => "auth/register",
        "uses" => "AuthController@postRegistration"
]);

/*
|
|   We’re using different request methods to do perform different actions on our events. GET requests retrieve data, 
|   POST requests store data. PUT requests update data and DELETE requests delete data. 
|   This is called REST (Representational State Transfer).
|
|   You can find out more about Route Model Binding at: http://laravel.com/docs/routing#route-model-binding.  
*/

Route::group(["before" => "api.auth"], function()
{

Route::get("event", [
         "as" => "event/index",
         "uses" => "EventController@index"
]);

Route::get("event/{id}", [
        "as" => "event/show",
        "uses" => "EventController@show"
]);

Route::post("event", [
        "as" => "event/store",
        "uses" => "EventController@store"
]);

Route::put("event/{id}", [
        "as" => "event/update",
        "uses" => "EventController@update"
]);

Route::delete("event/{id}", [
        "as" => "event/delete",
        "uses" => "EventController@destroy"
]);

});


Route::group(["before" => "api.auth"], function()
{

Route::get("sponsor", [
         "as" => "sponsor/index",
         "uses" => "SponsorController@index"
]);

Route::post("sponsor", [
        "as" => "sponsor/store",
        "uses" => "SponsorController@store"
]);

Route::get("sponsor/{id}", [
        "as" => "sponsor/show",
        "uses" => "SponsorController@show"
]);

Route::put("sponsor/{id}", [
        "as" => "sponsor/update",
        "uses" => "SponsorController@update"
]);

Route::delete("sponsor/{id}", [
        "as" => "sponsor/destroy",
        "uses" => "SponsorController@destroy"
]);

});



Route::group(["before" => "api.auth"], function()
{

Route::get("category", [
         "as" => "category/index",
         "uses" => "CategoryController@index"
]);

Route::post("category", [
        "as" => "category/store",
        "uses" => "CategoryController@store"
]);

Route::get("category/{category}", [
        "as" => "category/show",
        "uses" => "CategoryController@show"
]);

Route::put("category/{category}", [
        "as" => "category/update",
        "uses" => "CategoryController@update"
]);

Route::delete("category/{category}", [
        "as" => "category/destroy",
        "uses" => "CategoryController@destroy"
]);

=======
	return View::make('hello');
>>>>>>> laravel/master
});
