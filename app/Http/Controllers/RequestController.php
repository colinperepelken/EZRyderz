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
            $receiver_id = $_GET['receiver_id']; //Get the id of the person you are sending a request too
            $offer_id = $_GET['offer_id']; //Get the id of the persons offer
            $request_id = $request->input('request_id'); //Send the specific request
    		return view('pages.sendrequest', ['sender_id' => $sender_id, 
                                              'receiver_id' => $receiver_id,
                                              'offer_id' => $offer_id,
                                              'request_id' => $request_id]);
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

            //Get sender, receiver, and request ID
            $sender_id = $request->input('sender_id'); 
            $receiver_id = $request->input('receiver_id');
            $request_id = $request->input('request_id');
            $offer_id = $request->input('offer_id');

    		//Check if senders info should be included
    		$check = $request->input('infoOpt'); 
    		if ($check === "yes") {
    			//Pull data from DB
    			$address = DB::table('ride_requests')->where([['user_id', '=', $sender_id],['request_id', '=', $request_id]])->value('start_address');
    			$time = DB::table('ride_requests')->where([['user_id', '=', $sender_id],['request_id', '=', $request_id]])->value('arrival_time');

                //Ensure data isnt empty
                if(empty($address))
                    $address = "The sender did not include a home location in their schedule.";
                if(empty($time))
                    $time = "The sender did not include a start time in their schedule.";

    		} else {
    			$address = "Address not sent";
    			$time = "Time not sent";
    		}

            //Add the request to the request table
            DB::table('requests')->insert(['start_address' => $address,
                                           'arrival_time' => $time,
                                           'subject' => $subject,
                                           'msg' => $msg,
                                           'receiver_id' => $receiver_id,
                                           'sender_id' => $sender_id,
                                           'request_id' => $request_id,
                                           'offer_id' => $offer_id]);
            
            //Send the user an email to notify them of the request that has been sent
            //get the recipients email and username
            $toEmail = DB::table('users')->where('id', '=', $receiver_id)->value('email');
            $fromEmail = DB::table('users')->where('id', '=', $sender_id)->value('email');
            $sender = DB::table('users')->where('id', '=', $receiver_id)->value('name');
            
            // Subject
            $subject = 'You have received a request from EZRyderz';

            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = "You have received a new ride request from ".$sender."! \r\n 
                        Please go to EZRyderz and log in to view your reqeusts. \r\n 
                        We hope you haver a great day! - The EZRyderz team";
            $message = wordwrap($message, 70, "\r\n");

            //Set php.ini to connect to mailserver
            ini_set( 'sendmail_from', $fromEmail); 
            ini_set( 'SMTP', $toEmail); 
            ini_set( 'smtp_port', 25 );
            
            //Send
            //mail($toEmail, "$subject", $message, "From:" . $fromEmail);
      
            //Ugly inline javascript to give a confirmation alert
            echo "<script type =\"text/javascript\">alert(\"Request successfully sent to user.\")  </script>";

            return view('pages.welcome');
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
    }

    public function displayRequests(Request $request) {
        if (Auth::check()) {
            $user_id = Auth::user()->id; // get the current user's id
            $requests = DB::select(DB::raw("SELECT * FROM requests WHERE receiver_id = $user_id"));
            return view('pages.receivedrequests', ['requests' => $requests]);
        } else {
            return view('auth.login'); // if user is not logged in, redirect to login page
        }
    }

    public function requestDecline(Request $request) {
        if (Auth::check()) {
            //Request Id
            $request_id = $request->id;

            DB::table('requests')->where('id', '=', $request_id)->delete(); // delete from DB
            echo "<script type =\"text/javascript\">alert(\"Request successfully removed.\")  </script>";

            return $this-> displayRequests($request);
        } else {
            return view('auth.login'); // if user is not logged in, redirect to login page
        }
    }


    public function requestAccept(Request $request) {
        $request_id = $request->request_id;
        $driver_id = $request->driver_id;
        $offer_id = $request->offer_id;
        $carpooler_id = $request->carpooler_id;


        DB::table('ride_groups')->insert( // insert into ride group
            [
                'request_id' => $request_id,
                'driver_id' => $driver_id,
                'offer_id' => $offer_id,
                'carpooler_id' => $carpooler_id
            ]
        );


        return view('pages.welcome');
        $request_id = $request->id;

        DB::table('requests')->where('id', '=', $request_id)->delete(); // delete from DB
        echo "<script type =\"text/javascript\">alert(\"Request successfully accepted.\")  </script>";

        return $this-> displayRequests($request);
    }
}
