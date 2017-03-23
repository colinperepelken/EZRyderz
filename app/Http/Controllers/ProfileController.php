<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Image; // for the profile image

class ProfileController extends Controller
{

    public function show(Request $request)
    {
    	// if (Auth::Check()) {
    	// 	$user_id = Auth::user()->id;
    	// } else if (!isset($user_id)) {
    	// 	return view('auth.login'); // if user is not logged in, redirect to login page
    	// }
        $user_id = $request->input('id');
        if (is_null($user_id)) {
            if (Auth::Check()) {
                $user_id = Auth::user()->id;
            } else {
                return view('auth.login'); // if user is not logged in, redirect to login page
            }
        }

    	// fetch user information from id
    	$user = DB::table('users')->where('id', $user_id)->first();
      $all_ratings = DB::select(DB::raw("SELECT driverRating FROM rating"));



    	return view('pages.profile',
    		[
    			'name' => $user->name,
    			'bio' => $user->bio,
    			'location' => $user->location,
                'user_id' => $user_id,
                'avatar' => $user->avatar,
                'all_ratings' => $all_ratings,
                'updated' => false // account was not just updated
    		]);
    }

    public function update(Request $request)
    {
        if (Auth::Check()) { // if the user is logged in



            $user_id = $request->input('user_id');
            $bio = $request->input('bio');
            $location = $request->input('location');

            // fetch user information from id
            $user = DB::table('users')->where('id', $user_id)->first();

            // handle the user upload of avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            } else {
                $filename = $user->avatar; // use the current filename
            }

            // update database info
            DB::table('users')->where('id', $user_id)->update(['bio' => $bio, 'location' => $location, 'avatar' => $filename]);

            return view('pages.profile',
                [
                    'name' => $user->name,
                    'bio' => $bio,
                    'location' => $location,
                    'user_id' => $user_id,
                    'avatar' => $filename,
                    'updated' => true // set to true so view can tell information was just updated
                ]);
        }
    }
}
