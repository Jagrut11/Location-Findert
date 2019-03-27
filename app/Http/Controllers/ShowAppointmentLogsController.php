<?php

namespace App\Http\Controllers;

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
		 $q = Input::get ( 'q' );
	     
	    //$appointment = DB::table('appointment')->where('sender_id','=',$q)->get();
		 $data =  DB::table('appointment')->where('sender_id' ,'=', $q )->get();
		 
dd($q,$data);
	    //if(count($appointment) > 0)
	        
	        //return view('frontend.fixappointment')->withDetails($appointment)->withQuery ( $q );
	    //else return view ('frontend.fixappointment')->withMessage('No Details found. Try to search again !');

		
	}
}
