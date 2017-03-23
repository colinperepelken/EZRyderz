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
    		$check = $request->input('infoOpt'); //Check if senders info should be included
    		$subject = $request->input('subject');
    		$msg = $request->input('message');
    		$status = $request->input('status');

    		$user_id = $request->input('senderID'); // get the senders id

    		if ($check === "yes") {
    			$address = DB::table('ride_requests')->where('user_id', '=', $user_id)->value('start_address');
    			$time = DB::table('ride_requests')->where('user_id', '=', $user_id)->value('arrival_time');
    			return view('pages.test', ['address' => $address,
    								   'time' => $time,
    								   'status' => $status,
    								   'subject' => $subject,
    								   'msg' => $msg]);
    		} else {
    			$address = "Not set";
    			$time = "Not set";
    			return view('pages.test', ['address' => $address,
    								   'time' => $time,
    								   'status' => $status,
    								   'subject' => $subject,
    								   'msg' => $msg]);
    		}
    		
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
    }
}
