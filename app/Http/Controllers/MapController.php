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


    	// fetch all ride requests
    	$ride_requests = DB::table('ride_requests')->get();

    	Mapper::location('Kelowna, BC')->map(['zoom' => 15, 'center' => false, 'marker' => false]);

    	// loop through each ride request
    	foreach ($ride_requests as $ride_request) {
    		$location_object = Mapper::location($ride_request->start_address); // get lat and long from location string and store in obj
    		Mapper::marker($location_object->getLatitude(), $location_object->getLongitude()); // map each of the starting addresses
    	}

    	return view('pages.map'); // return the map view
    }
}
