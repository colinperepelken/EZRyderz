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

Route::get('/viewcarinformation', 'PagesController@viewcarinformation'); // view the schedule of a user offering a ride

Route::get('/viewdrivingschedule', 'PagesController@viewdrivingschedule'); // view the schedule of a user offering a ride

Route::get('/viewcarpoolingschedule', 'PagesController@viewcarpoolingschedule'); // view the schedule of a user requesting a ride

Route::get('/compatibledrivers', array('as' => 'compatibledrivers', 'uses' => 'PagesController@compatibledrivers')); // view a list of compatible drivers for a carpooler's specific ride request

Route::get('/driverslist', array('as' => 'driverslist', 'uses' => 'PagesController@driverslist')); // view list of people offering a ride

Route::get('/carpoolerslist', array('as' =>'carpoolerslist', 'uses' => 'PagesController@carpoolerslist')); // view list of people requesting a ride

// view my ride requests or my ride offers
Route::get('/myoffers', ['as' => 'myoffers', 'uses' => 'PagesController@myoffers']);
Route::get('/myrequests', ['as' => 'myrequests', 'uses' => 'PagesController@myrequests']);

// Schedule Controller
Route::get('/schedule/{status?}', array('as' => 'schedule', 'uses' => 'ScheduleController@show'));
Route::post('/schedule', ['as' => 'schedule', 'uses' => 'ScheduleController@submit']);

// Profile Controller
Route::get('/profile', array('as' => 'profile', 'uses' => 'ProfileController@show'));
Route::post('/profile', ['as' => 'profile', 'uses' => 'ProfileController@update']);

// send user's "car information" input to database
Route::post('/insertcarinformation', 'InputCarInfoController@submit');

Route::get('/sendrequest', 'PagesController@sendrequest'); //Request form

//Ratings
Route::get('/ratings', 'PagesController@ratings');
Route::post('/insertrating', ['as' => 'insertrating', 'uses' => 'RatingController@submit']);

Auth::routes();

// Home
Route::get('/home', 'HomeController@index');

// GOOGLE MAPS
Route::get('/map', 'MapController@show'); // show the map
Route::post('/mapshow', ['as' => 'mapshow', 'uses' => 'MapController@show']); // send the map a specific ride offer to show
Route::post('/map', ['as' => 'map-cancel', 'uses' => 'MapController@cancelOffer']); // cancel the ride offer
Route::post('/map-add-rider', ['as' => 'map-add-rider', 'uses' => 'MapController@addRider']); // cancel the ride offer

// Request Controller
Route::get('/sendrequest', array('as' => 'requestStart', 'uses' => 'RequestController@getId'));
Route::get('/receivedrequests',array('as' => 'displayRequests', 'uses' => 'RequestController@displayRequests'));
Route::post('/request', ['as' => 'request', 'uses' => 'RequestController@sendMessage']);
