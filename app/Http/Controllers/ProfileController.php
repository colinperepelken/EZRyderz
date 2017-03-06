<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{

    public function show($user_id = null)
    {
    	if (Auth::Check()) {
    		$user_id = Auth::user()->id;
    	} else if (!isset($user_id)) {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}

    	// fetch user information from id
    	$user = DB::table('users')->where('id', $user_id)->first();

    	return view('pages.profile', 
    		[
    			'name' => $user->name,
    			'bio' => $user->bio,
    			'location' => $user->location,
                'user_id' => $user_id,
                'updated' => false // account was not just updated
    		]);
    }

    public function update(Request $request)
    {
        if (Auth::Check()) { // if the user is logged in

           // $input = Request::all('user_id', 'location', 'bio');

            $user_id = $request->input('user_id');
            $bio = $request->input('bio');
            $location = $request->input('location');

            // fetch user information from id
            $user = DB::table('users')->where('id', $user_id)->first();

            // update database info
            DB::table('users')->where('id', $user_id)->update(['bio' => $bio, 'location' => $location]);

            return view('pages.profile',
                [
                    'name' => $user->name,
                    'bio' => $bio,
                    'location' => $location,
                    'user_id' => $user_id,
                    'updated' => true // set to true so view can tell information was just updated
                ]);
        }
    }
}
