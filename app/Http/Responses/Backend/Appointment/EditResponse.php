<?php

namespace App\Http\Responses\Backend\Appointment;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Appointment\Appointment
     */
    protected $appointments;

    /**
     * @param App\Models\Appointment\Appointment $appointments
     */
    public function __construct($appointments)
    {
        $this->appointments = $appointments;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.appointments.edit')->with([
            'appointments' => $this->appointments
        ]);
    }
}