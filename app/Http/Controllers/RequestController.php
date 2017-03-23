<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RequestController extends Controller
{
	public function getId(Request $request) {
		if (Auth::check()) { // check if user is logged in
    		$sender_id = Auth::user()->id; // get the current user's id
            $receiver_id = $request->input('receiver_id'); //Get the id of the person you are sending a request too
    		$status = $request->input('status'); //User is asking or offering
    		return view('pages.sendrequest', ['sender_id' => $sender_id, 
                                              'receiver_id' => $receiver_id,
                                              'status' => $status]);
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}	
	}

    public function sendMessage(Request $request) {
    	if (Auth::check()) { // check if user is logged in
    		//initialize values
   			$subject = $request->input('subject');
   			$msg = $request->input('message');
    		$target = $request->input('target');

            //Change empty values 
    		if(empty($subject))
    			$subject = "No subject entered.";
    		if(empty($msg))
    			$msg = "No message entered.";

            //Get sender and receivers ID
            $sender_id = $request->input('sender_id'); 
            $receiver_id = $request->input('receiver_id');

    		//Check if senders info should be included
    		$check = $request->input('infoOpt'); 
    		if ($check === "yes") {
    			//Pull data from DB
    			$address = DB::table('ride_requests')->where('user_id', '=', $sender_id)->value('start_address');
    			$time = DB::table('ride_requests')->where('user_id', '=', $sender_id)->value('arrival_time');

                //Ensure data isnt empty
                if(empty($address))
                    $address = "The sender did not include a home location in their schedule.";
                if(empty($time))
                    $time = "The sender did not include a start time in their schedule.";

    		} else {
    			$address = "Address not sent";
    			$time = "Time not sent";
    		}

    		return view('pages.test', ['address' => $address,
    								   'time' => $time,
    								   'target' => $target,
    								   'subject' => $subject,
    								   'msg' => $msg,
                                       'receiver_id' => $receiver_id,
                                       'sender_id' => $sender_id]);
    		
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
    }
}
