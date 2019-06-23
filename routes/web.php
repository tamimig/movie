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


Route::get('/home', function () {
    return redirect('movie');
});

Route::get('/add', 'MoviesController@screen_add')->name('screen.add'); 
Route::get('/details', 'MoviesController@movie_details')->name('movie.detalis'); 


Route::resources([
	'actor' => 'ActorsController', 
	'movie' => 'MoviesController',
	'producer' => 'ProducersController', 
	
]); 
