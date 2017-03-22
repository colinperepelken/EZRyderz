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

Route::get('/viewdrivingschedule', 'PagesController@viewdrivingschedule'); // view the schedule of a user offering a ride

Route::get('/viewcarpoolingschedule', 'PagesController@viewcarpoolingschedule'); // view the schedule of a user requesting a ride

Route::get('/driverslist', array('as' => 'driverslist', 'uses' => 'PagesController@driverslist')); // view list of people offering a ride

Route::get('/carpoolerslist', array('as' =>'carpoolerslist', 'uses' => 'PagesController@carpoolerslist')); // view list of people requesting a ride

// Schedule Controller
Route::get('/schedule/{status?}', array('as' => 'schedule', 'uses' => 'ScheduleController@show'));
Route::post('/schedule', ['as' => 'schedule', 'uses' => 'ScheduleController@submit']);

// Profile Controller
Route::get('/profile', array('as' => 'profile', 'uses' => 'ProfileController@show'));
Route::post('/profile', ['as' => 'profile', 'uses' => 'ProfileController@update']);

// send user's "car information" input to database
Route::post('/insertcarinformation', 'InputCarInfoController@submit');

Route::get('/sendrequest', 'PagesController@sendrequest'); //Request form


Auth::routes();

// Home
Route::get('/home', 'HomeController@index');


// GOOGLE MAPS
Route::get('/map', 'MapController@show');
