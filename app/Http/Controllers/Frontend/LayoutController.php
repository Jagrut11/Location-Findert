<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LayoutController extends Controller
{
    public function viewLayout($floor_no)
    {
    	//$layout=$floor_no;
    	//dd($layout);
    	$layout = DB::table('floors')
		  ->select('floors.layout')
		  ->where('floors.floor_no',$floor_no)
		  ->get();
		  //dd($layout);
		   //$result=$layout ? $layout[0]->layout : 0;
		  // dd($result);
		   //$result= json_encode($layout);
		  // dd($result);
		  //return view('frontend.locate');
		  //parse_str(,$layout)
		  return view('frontend.locate');
    }
}
