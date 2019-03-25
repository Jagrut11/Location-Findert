<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Appointment\Appointment;
use App\Models\Access\User\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Repositories\Frontend\Access\User\UserRepository;

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
        $validation = Validator::make($request->all(), [
            'first_name'            => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:4',
            'password_confirmation' => 'required|same:password',
            'is_term_accept'        => 'required',
        ]);
        


    	//$Appointment = $request->except(['_token']);

        // $q= $request->get('email');
        //$time=  $request->get('appointmentime');
        // $senderid = DB::table('users')->where('email', $q)->pluck('id');
        $fix_appointment = new Appointment([

            'sender_id' => $request->get('email'),
            'receiver_id' => $request->get('loggedinuser'),
            'appointment_date' => $request->get('appointmentdate'),
            'appointment_time' => $request->get('appointmentime')
            

        ]);

        //dd($fix_appointment, $time);
        $fix_appointment -> save();
                

        return view('frontend.fixappointment');
        
    }
}
