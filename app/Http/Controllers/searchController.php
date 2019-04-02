<?php


namespace App\Http\Controllers;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use What3words\Geocoder\Geocoder;
 use What3words\Geocoder\AutoSuggestOption;
 use DB;

class searchController extends Controller
{
    //
    public function search()
	{     
	
	    $q = Input::get ( 'q' );
	     
	    $user = User::where('first_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->get();

	    if(count($user) > 0)
	        
	        return view('frontend.fixappointment')->withDetails($user)->withQuery ( $q );
	    else return view ('frontend.fixappointment')->withMessage('No Details found. Try to search again !');

	}
	public function locate()
	{
		//$user = DB::table('users')->select('latitude','longitude')->get();
//dd($user);
		   $data = DB::table('users')->select('latitude','longitude')->get();
		   //dd($lat);
		   
		   $long = DB::table('users')->select('longitude')->get();
		   $api = new Geocoder("KS18UC0Z");
		  $result = $api->convertTo3wa($lat);
		   
		    //print_r($result);
		   //$result1 = $api->convertToCoordinates("index.home.raft");
			//print_r($result1);
		//$result = $api->gridSection(23.028264, 72.505427, 23.029341, 72.506855);
//print_r($result);

		   //$result2 = $api->gridSection(23.028264, 72.505427, 23.029341, 72.506855);
		   //print_r($result2);
		   //$result2 = $api->autosuggest("fun.with.code", [AutoSuggestOption::focus(51.4243877,-0.34745), AutoSuggestOption::numberResults(6)]);
		  //print_r($result2);
		   $words = $result["words"];
		   print "The words for this co-ordinates are " . $words . "\n";

		   print_r($api->getError());

	        
	 return view('frontend.locate',array('words' => $words));	
	}
}
 