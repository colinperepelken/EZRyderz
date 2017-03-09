<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ScheduleController extends Controller
{
	// used by GET requests
    public function show(Request $request) {
    	$status = $request->input('status'); // get whether the user wants to be a rider, driver or null
    	return view("pages.schedule", ['status' => $status]); // send the status to the schedule page
    }

    // used by POST requests to submit a ride request or a ride offer
    public function submit(Request $request) {
    	if (Auth::check()) { // check if user is logged in
    		$user_id = Auth::user()->id; // get the current user's id

    		$status = $request->input('status'); // get whether user wants to be a rider or a driver

    		if ($status === "driver") {

    			// insert into ride_offers database
            	DB::table('ride_offers')->insert(
            		[
            			'user_id' => $user_id,
            			'start_address' => $request->input('startAddress'),
            			'destination_address' => $request->input('destAddress'),
            			'arrival_time' => $request->input('depTime'),
            			'end_time' => $request->input('endTime'),
            			'max_deviation' => $request->input('maxDeviation')
            		]
            	);


    		} else if ($status === "rider") {

    			// insert into ride_requests database
            	DB::table('ride_requests')->insert(
            		[
            			'user_id' => $user_id,
            			'start_address' => $request->input('startAddress'),
            			'destination_address' => $request->input('destAddress'),
            			'arrival_time' => $request->input('depTime')
            		]
            	);

    		}

    		return view('pages.welcome'); // after insert, redirect user

    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
      
    }
}
