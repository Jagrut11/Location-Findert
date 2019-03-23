<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Access\User\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class FixAppointmentController extends Controller
{
    //
    public function save_data()
	{     
	 $user = FixAppointmentController::create();
	 return redirect()->route('frontend.fixappointment');
		dd($user);
	}
	 public function store(Request $request)
    {
        
    	$input = $request->except(['_token']);
    	dd($input);
        

        //return view('frontend.fixappointment',$data);
        
    }
}
