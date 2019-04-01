<?php

namespace App\Http\Responses\Backend\Seat;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Seat\Seat
     */
    protected $seats;

    /**
     * @param App\Models\Seat\Seat $seats
     */
    public function __construct($seats)
    {
        $this->seats = $seats;
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
        return view('backend.seats.edit')->with([
            'seats' => $this->seats
        ]);
    }
}