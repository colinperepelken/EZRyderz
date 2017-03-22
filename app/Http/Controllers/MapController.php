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
    public function show() {

    	// going to map a temporary route... should later be grabbed from POST request/ride offer page
    	$driver_start_location = Mapper::location("432 Quilchena Drive, Kelowna, BC");
    	$driver_end_location = Mapper::location("University of British Columbia Okanagan");

    	$driver_start = array('lat' => $driver_start_location->getLatitude(), 'long' => $driver_start_location->getLongitude());
    	$driver_end = array('lat' => $driver_end_location->getLatitude(), 'long' => $driver_end_location->getLongitude());


    	// fetch all ride requests
    	$ride_requests = DB::table('ride_requests')->get();

    	// store lat and long of ride requests for ease of use of API
    	$carpooler_positions = [];
    	for ($ride_requests as $ride_request) {
    		array_push($carpooler_positions, array(
    			'lat' => Mapper::location($ride_request->start_address)->getLatitude(), 
    			'long' => Mapper::location($ride_request->start_address)->getLongitude()
    			));
    	}


    	return view('pages.map', 
		[
			'ride_requests' => $ride_requests, // send the list of requests to the view
			'carpooler_positions' => $carpooler_positions,
			'driver_start' => $driver_start,
			'driver_end' => $driver_end
		]); // return the map view
    }
}
