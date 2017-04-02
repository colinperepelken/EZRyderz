<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Auth;

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


    	// fetch ride group
    	$riders = DB::table('ride_groups')->where('offer_id', $offer_id)->get();
    	$riders_info = [];
    	foreach ($riders as $rider) {

    		$rider_info = DB::table('users')->where('id', $rider->carpooler_id)->first();

    		array_push($riders_info, array(
    			'name' => $rider_info->name,
    			'id' => $rider->carpooler_id
    		));
    	}

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
			'driver_end_address' => $driver_end_address,
			'riders_info' => $riders_info, // send ride group riders
			'offer_id' => $offer_id
		]); // return the map view
    }

    /*
     * Add a rider to the ride group.
     */
    public function addRider(Request $request) {
    	$offer_id = $request->offer_id;
    	$driver_id = $request->driver_id;
    	$carpooler_id = $request->carpooler_id;

    	DB::table('ride_groups')->insert( // insert into ride group
 	   		[
 	   			'offer_id' => $offer_id,
 	   			'driver_id' => $driver_id,
 	   			'carpooler_id' => $carpooler_id
    		]
    	);

    	return view('pages.welcome');
    }

    /*
     * Cancels the ride offer.
     */
    public function cancelOffer(Request $request) {
    	$offer_id = $request->offer_id;

    	DB::table('ride_offers')->where('offer_id', $offer_id)->delete(); // delete from DB
    	return view('pages.welcome'); // re direct to home after delete
    }

    /*
     * Information for the ride group page.
     */
    public function ridegroup(Request $request) {

        $user_id = Auth::user()->id; // get the logged in user's id

        // retrieve ride groups in which user is a driver and in which user is a rider
        $driver_groups = DB::table('ride_groups')->where('driver_id', $user_id)->get();
        $rider_groups = DB::table('ride_groups')->where('carpooler_id', $user_id)->get();


        // fill driver groups array with information for the view
        $driver_groups_arr = [];
        foreach ($driver_groups as $group) {

            // get ride offer object associated with this group
            $ride_offer = DB::table('ride_offers')->where('offer_id', $group->offer_id)->first();

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

            // fetch ride group
            $riders = DB::table('ride_groups')->where('offer_id', $group->offer_id)->get();
            $riders_info = [];
            foreach ($riders as $rider) {

                $rider_info = DB::table('users')->where('id', $rider->carpooler_id)->first();

                array_push($riders_info, array(
                    'name' => $rider_info->name,
                    'id' => $rider->carpooler_id
                ));
            }


            array_push($driver_groups_arr, [
                'offer_id' => $group->offer_id,
                'driver_start' => $driver_start,
                'driver_end' => $driver_end,
                'carpooler_info' => $carpooler_info,
                'driver_start_address' => $driver_start_address,
                'driver_end_address' => $driver_end_address,
                'riders_info' => $rider_info,
                'carpooler_info' => $carpooler_info
            ]);
        }


        // fill rider groups array with informationf or the view
        $rider_groups_arr = [];
        foreach ($rider_groups as $group) {
            // get ride offer object associated with this group
            $ride_offer = DB::table('ride_offers')->where('offer_id', $group->offer_id)->first();

            // set via offer info
            $driver_start_address = $ride_offer->start_address;
            $driver_end_address = $ride_offer->destination_address;

            // get location objects
            $driver_start_location = Mapper::location($driver_start_address);
            $driver_end_location = Mapper::location($driver_end_address);

            // get lat and long
            $driver_start = array('lat' => $driver_start_location->getLatitude(), 'long' => $driver_start_location->getLongitude());
            $driver_end = array('lat' => $driver_end_location->getLatitude(), 'long' => $driver_end_location->getLongitude());

            // fetch ride group
            $riders = DB::table('ride_groups')->where('offer_id', $group->offer_id)->get();
            $riders_info = [];
            foreach ($riders as $rider) {

                $rider_info = DB::table('users')->where('id', $rider->carpooler_id)->first();

                array_push($riders_info, array(
                    'name' => $rider_info->name,
                    'id' => $rider->carpooler_id
                ));
            }

            // TODO: get rider start address and use instead of driver start address for map


            array_push($rider_groups_arr, [
                'offer_id' => $group->offer_id,
                'driver_start' => $driver_start,
                'driver_end' => $driver_end,
                'driver_start_address' => $driver_start_address,
                'driver_end_address' => $driver_end_address,
                'riders_info' => $rider_info
            ]);
        }


        return view('pages.ridegroup', [
            'driver_groups' => $driver_groups_arr,
            'rider_groups' => $rider_groups_arr
        ]);
    }
}
