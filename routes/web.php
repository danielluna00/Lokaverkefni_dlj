<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});
Route::get('/movies',"MoviesController@index");

Route::get("/movies/create","MoviesController@create")->middleware('auth');

Route::get("/movies/{movie}","MoviesController@show");

Route::post("/movies","MoviesController@store")->middleware('auth');
/*
Route::get("/threads/{thread}/edit","ThreadsController@edit")->middleware('auth');

Route::patch("/threads/{thread}","ThreadsController@update")->middleware('auth');
*/
Route::delete("/movies/{movie}","MoviesController@destroy")->middleware('auth');

Route::post('/movies/{movie}/comment','CommentsController@store')->middleware('auth');
/*
Route::get("/threads/user/{user}","ThreadsController@index");
*/