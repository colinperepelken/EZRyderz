<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ProfileController extends Controller
{

    public function show($id = null)
    {
    	if(isset($id)) { // check if id is specified
    		return view('profile', ['id' => $id]);
    	} else {
    		if (Auth::Check()) { // check if user is logged in
				$id = Auth::user()->id;
				return view('profile', ['id' => $id]); // re direct to profile page with logged in user's id
			} else {
				return view('auth.login'); // if user is not logged in, redirect to login page
			}
			return view('welcome');
    	}
    	
    }
}
