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

/*
 * PageController
 */
Route::get('/', 'PagesController@welcome'); // welcome page

Route::get('/about', 'PagesController@about'); // about page

Route::get('/login', 'PagesController@login'); // login page

/*
 * Route for schedule
 */
Route::get('/schedule', function() {
	return view('schedule');
});

// Profile Controller
Route::get('/profile/{user_id?}', 'ProfileController@show')->where('user_id', '[0-9]+'); // id must be integer


Auth::routes();

// Home
Route::get('/home', 'HomeController@index');
