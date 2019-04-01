<?php


namespace App\Http\Controllers;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
//use What3words\Geocoder\Geocoder;

 use What3words\Geocoder\Geocoder;
 use What3words\Geocoder\AutoSuggestOption;
// namespace What3words\Geocoder\Test;
// use What3words\Tests\GeocoderTest;


class SearchController extends Controller
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
		$users = DB::table('users')->select('latitude','longitude')->get();
		//dd($users);

		$api= new Geocoder("79NK10MQ");
		$result= $api->convertTo3wa(23.028264,72.505427);
		$words = $result["words"];
		print"The words for (23.028264,72.505427) are " . $words . "\n";
		print_r($api->getError());	        
	 	return view('frontend.locate');
	}
}
 