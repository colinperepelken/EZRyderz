<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;

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

    public function viewschedule()
    {
      return view('pages.viewschedule');
    }
}
