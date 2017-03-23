<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }

    public function welcome()
    {
    	return view('pages.welcome');
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function carinformation()
    {
      return view('pages.carinformation');
    }

    public function viewdrivingschedule()
    {
      return view('pages.viewdrivingschedule');
    }

    public function viewcarpoolingschedule()
    {
      return view('pages.viewcarpoolingschedule');
    }

    public function sendrequest(){
      return view('pages.sendrequest');
    }

    public function test()
    {
      return view('pages.test');
    }

    /*
      Retreives list of all drivers from database
    } */
    public function driverslist(){
      /*  $all_users = DB::table('users')->get(); */
        $all_drivers = DB::select(DB::raw("SELECT * FROM users, ride_offers WHERE users.id = ride_offers.user_id"));
        return view('pages.driverslist', ['all_drivers' => $all_drivers]);
    }

    /*
      Retreives list of all carpoolers from database
    } */
    public function carpoolerslist(){
      $all_carpoolers = DB::select(DB::raw("SELECT * FROM users, ride_requests WHERE users.id = ride_requests.user_id"));
      return view('pages.carpoolerslist', ['all_carpoolers' => $all_carpoolers]);
    }
}
