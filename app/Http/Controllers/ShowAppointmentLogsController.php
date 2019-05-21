<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;


class ShowAppointmentLogsController extends Controller
{
    //
    public function showlogs()
	{     
		 //$q = Input::get ( 'notify' );
	     $q=Auth::user()->id;
	    $appointment = DB::table('appointment')
	    ->join('users','users.id','=','appointment.sender_id')
	    ->select('appointment.*','users.first_name','users.last_name')
	    ->where('sender_id','=',$q)
	    ->orwhere('receiver_id','=',$q)
	    ->get();
	    

	    //print_r($appointment);
		 //$data =  DB::table('appointment')->where('sender_id' ,'=', $q )->get();
		 
//dd($appointment);
	    //if(count($appointment) > 0)
	      return view('frontend.user.dashboard', array('appointment'=>$appointment)); 
	        //return view('frontend.fixappointment')->withDetails($appointment)->withQuery ( $q );
	    //else return view ('frontend.fixappointment')->withMessage('No Details found. Try to search again !');

		
	}
}
