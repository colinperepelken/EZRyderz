<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::check()) {
            $id = Auth::user()->id;
            $hasMsg = DB::table('participants')->where('user_id', $id)->value('last_read');
            return view('home', ['hasMsg' => $hasMsg]);
        } else {
            return view('home');
        }
    }
}
