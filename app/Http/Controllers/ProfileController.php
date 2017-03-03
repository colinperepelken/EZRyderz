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
    			'location' => $user->location
    		]);
    }
}
