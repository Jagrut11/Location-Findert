<?php


namespace App\Http\Controllers;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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

		 //  $api = new Geocoder("KS18UC0Z");
		 //  $result = $api->convertTo3wa(51.432393,-0.348023);
		 //  print_r($result);
		
		 // $result1 = $api->gridSection(39.903795, 116.384550, 39.902718, 116.383122);
		 // print_r($result1);
		 // $result2 = $api->autosuggest("fun.with.code", [AutoSuggestOption::focus(51.4243877,-0.34745), AutoSuggestOption::numberResults(6)]);
		 // print_r($result2);
		  //print_r($api->getError());
	        
	 return view('frontend.locate');
	}
}
 