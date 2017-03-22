<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapController extends Controller
{
	/*
	 * Simple function to show a basic test map.
	 */
    public function show() {
    	Mapper::location('432 Quilchena Drive, Kelowna')->map();

    	return view('pages.map');
    }
}
