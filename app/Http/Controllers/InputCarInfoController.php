<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class InputCarInfoController extends Controller
{
    public function submit(Request $req){
      if (Auth::Check()) {
    		$user_id = Auth::user()->id;
    	} else if (!isset($user_id)) {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}

      $carinformation = DB::table('carinformation');

      // fetch car information from id
      $car_id = DB::table('carinformation')->where('user_id', $user_id)->first();

      // if nothing is returned, use an insert statement
      if (is_null($car_id)) {
        $value = array('user_id' => $user_id,'make' => $req->make, 'model' => $req->model, 'year' => $req->year,
        'licensePlate' => $req->licensePlate, 'numberOfSeats' => $req->numberOfSeats,
        'hasAirConditioning' => $req->hasAirConditioning, 'efficiency' => $req->efficiency,
        'efficiencyUnits' => $req->efficiencyUnits);
        $carinformation->insert($value);
      } // if something is returned, use an update statement
      else {
        $value = array('user_id' => $user_id,'make' => $req->make, 'model' => $req->model, 'year' => $req->year,
        'licensePlate' => $req->licensePlate, 'numberOfSeats' => $req->numberOfSeats,
        'hasAirConditioning' => $req->hasAirConditioning, 'efficiency' => $req->efficiency,
        'efficiencyUnits' => $req->efficiencyUnits);
        $carinformation->where('user_id', $user_id)->update($value);
      }

      /*Should return to a different view after data has successfully been inserted. This is
      just for now.*/
      return view('pages.carinformation');
    }
}
