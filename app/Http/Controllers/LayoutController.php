<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LayoutController extends Controller
{
    public function viewLayout(Request $request)
    {
    	//$layout=$floor_no;
    	//dd($layout);
    // 	$layout = DB::table('floors')
		  // ->select('floors.LayoutImg')
		  // ->where('floors.floor_no',$floor_no)
		  // ->get();
		  //dd($layout);
    	$abc="";
		  $abc=$request->session()->get('path');
		  //dd($request->session()->get('path'));
		  return view('frontend.locate1')->withdetails($abc);
    }
}
