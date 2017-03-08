<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InputCarInfoController extends Controller
{
    public function submit(Request $req){
      $value = array('make' => $req->make, 'model' => $req->model, 'year' => $req->year,
      'licensePlate' => $req->licensePlate, 'numberOfSeats' => $req->numberOfSeats,
      'hasAirConditioning' => $req->hasAirConditioning, 'efficiency' => $req->efficiency,
      'efficiencyUnits' => $req->efficiencyUnits, 'visibility' => $req->visibility);
      DB::table('carinformation')->insert($value);

      /*Should return to a different view after data has successfully been inserted. This is
      just for now.*/
      return view('pages.carinformation');
    }
}
