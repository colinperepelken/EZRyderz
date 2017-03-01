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
 * Route for main welcome page
 */
Route::get('/', function () {
    return view('welcome');
});

/*
 * Route for about page
 */
Route::get('/about', function() {
	return view('about');
});

/*
 * Route for users page
 */
Route::get('user/{id}', function($id) {
	echo "User id is: " . $id;
});
