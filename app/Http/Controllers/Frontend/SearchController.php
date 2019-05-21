<?php
namespace App\Http\Controllers;
// namespace App\Http\Controllers\Backend;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use What3words\Geocoder\Geocoder;
 use What3words\Geocoder\AutoSuggestOption;
class SearchController extends Controller
{
	public function index()
	{
		return view('frontend.fixappointment');
	}
	
    public function search()
	{     
	
		//use this search functionality
	    $q = Input::get ( 'q' );

	    if(is_null($q))
	    {
	    	$alert=true;
	    	return view('frontend.fixappointment')->with('alert','No details found. Try to search again !!!');
	    }
	     
	    $user = User::where('first_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->get();
	    if(count($user) > 0)
	        
	        return view('frontend.fixappointment')->withDetails($user)->withQuery ( $q );
	    else return view ('frontend.fixappointment')->withMessage('No Details found. Try to search again !');
	    //search functionality end
	}
	function fetch(Request $request)
	{
		if($request->get('query'))
		{
			$query = $request->get('query');
			$data = DB::table('users')
			->where('first_name', 'LIKE', "%{$query}%")->orWhere('email','LIKE',"%{$query}%")->orWhere('last_name','LIKE',"%{$query}%")
			->get();
			$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
			foreach($data as $row)
			{
				$output .= '
				<li><a href="#">'.$row->first_name.'  </a></li>
				
				';
			}
			$output .= '</ul>';
			echo $output;	
		}
	}
	public function locate($id)
	{
		// echo $id;
		// exit();
		  $user = DB::table('users')
		  ->join('branches','branches.id','=','users.branch_id')
		  ->join('seats','seats.id','=','users.seat_id')
          ->join('floors','floors.id','=','seats.floor_id')
		  ->select('users.*', 'branches.branch_name','floors.floor_no','seats.seat_no')
		  ->where('users.id',$id)
		  ->get();
    //         
		  foreach($user as $usersDetail){
		   $lat=($usersDetail->latitude);
		   $lng=($usersDetail->longitude);
		    // print_r($lat);
		    //  print_r($lng);
		  }
		 
		$api= new Geocoder("79NK10MQ");
		$result= $api->convertTo3wa($lat,$lng);
		$words = $result["words"];
		//print"The words for ($lat,$lng) are " . $words . "\n";
		print_r($api->getError());	        
	 	return view('frontend.locate',array('words'=> $words,'user'=>$user));
	}
}