<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RequestController extends Controller
{
	public function getId(Request $request) {
		if (Auth::check()) { // check if user is logged in
    		$user_id = Auth::user()->id; // get the current user's id
    		$status = $request->input('status'); //User is asking or offering
    		return view('pages.sendrequest', ['id' => $user_id, 'status' => $status]);
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}	
	}

    public function sendMessage(Request $request) {
    	if (Auth::check()) { // check if user is logged in
    		//initialize values
   			$subject = $request->input('subject');
   			$msg = $request->input('message');
    		//Change empty values 
    		if(empty($subject))
    			$subject = "No subject entered.";
    		if(empty($msg))
    			$msg = "No message entered.";
    		$target = $request->input('target');

    		//Check if senders info should be included
    		$check = $request->input('infoOpt'); 
    		if ($check === "yes") {
    			//Get the senders id and pull data from DB
    			$user_id = $request->input('senderID'); 
    			$address = DB::table('ride_requests')->where('user_id', '=', $user_id)->value('start_address');
    			$time = DB::table('ride_requests')->where('user_id', '=', $user_id)->value('arrival_time');
    		} else {
    			$address = "Address not sent";
    			$time = "Time not sent";
    		}

    		return view('pages.test', ['address' => $address,
    								   'time' => $time,
    								   'target' => $target,
    								   'subject' => $subject,
    								   'msg' => $msg]);
    		
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
    }
}
