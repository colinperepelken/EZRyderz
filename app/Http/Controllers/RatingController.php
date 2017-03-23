<?php
namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RatingController extends Controller{
    public function submit(Request $req){
      if (Auth::Check()) {
    		$user_id = Auth::user()->id;
    	} else if (!isset($user_id)) {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}

      $value = array('driverRating' => $req->Drating,'commentASdriver' => $req->comment,);
      DB::table('rating')->insert($value);

      /*Should return to a different view after data has successfully been inserted. This is
      just for now.*/
      return view('pages.ratings');
    }
}























/*namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Image; // for the profile image

class RatingsController extends Controller
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
    	$rating = DB::table('rating')->where('id', $rating_id)->first();

    	return view('pages.rating',
    		[
    			'driverRating' => $rating->DRvalue,
          'passengerRating' => $rating->PRvalue,
    			'commentASpassenger' => $rating->CasPvalue,
    			'commentASdriver' => $rating->CasDvalue,
                'user_id' => $user_id,
                'avatar' => $user->avatar,
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
            $user = DB::table('ratings')->where('id', $user_id)->first();

            // update database info
            DB::table('rating')->where('id', $user_id)->update(['bio' => $bio, 'location' => $location, 'avatar' => $filename]);

            return view('pages.ratings',
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
