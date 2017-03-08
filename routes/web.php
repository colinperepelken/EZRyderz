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

Route::get('/carinformation', 'PagesController@carinformation'); // input car information page

Route::get('/viewschedule', 'PagesController@viewschedule'); // view schedule page

/*
 * Route for schedule
 */
Route::get('/schedule', function() {
	return view('pages.schedule');
});

// Profile Controller
Route::get('/profile/{user_id?}', array('as' => 'profile', 'uses' => 'ProfileController@show'))->where('user_id', '[0-9]+'); // id must be integer
Route::post('/profile', ['as' => 'profile', 'uses' => 'ProfileController@update']);

Auth::routes();

// Home
Route::get('/home', 'HomeController@index');
