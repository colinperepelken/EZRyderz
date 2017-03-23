<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapController extends Controller
{
	/*
	 * Simple function to show a basic test map.
	 */
    public function show(Request $request) {

    	// get info from request
    	$offer_id = $request->offer_id;

    	// query DB for ride offer info
    	$ride_offer = DB::table('ride_offers')->where('offer_id', $offer_id)->first();

    	// set via offer info
    	$driver_start_address = $ride_offer->start_address;
    	$driver_end_address = $ride_offer->destination_address;

    	// get location objects
    	$driver_start_location = Mapper::location($driver_start_address);
    	$driver_end_location = Mapper::location($driver_end_address);

    	// get lat and long
    	$driver_start = array('lat' => $driver_start_location->getLatitude(), 'long' => $driver_start_location->getLongitude());
    	$driver_end = array('lat' => $driver_end_location->getLatitude(), 'long' => $driver_end_location->getLongitude());


    	// fetch all ride requests
    	$ride_requests = DB::table('ride_requests')->get();


    	// store lat and long of ride requests for ease of use of API
    	$carpooler_info = [];
    	foreach ($ride_requests as $ride_request) {

    		// fetch users who made the ride requests
    		$user_id = $ride_request->user_id;
    		$username = DB::table('users')->where('id', $user_id)->first()->name;


    		array_push($carpooler_info, array(
    			'lat' => Mapper::location($ride_request->start_address)->getLatitude(), 
    			'long' => Mapper::location($ride_request->start_address)->getLongitude(),
    			'id' => $user_id,
    			'start_address' => $ride_request->start_address,
    			'username' => $username
    		));
    	}


    	return view('pages.map', 
		[
			'carpooler_info' => $carpooler_info,
			'driver_start' => $driver_start,
			'driver_end' => $driver_end,
			'driver_start_address' => $driver_start_address,
			'driver_end_address' => $driver_end_address
		]); // return the map view
    }


    /*
     * Cancels the ride offer.
     */
    public function cancelOffer(Request $request) {
    	echo $request->offer_id;
    }
}
