<?php

namespace App\Http\Responses\Backend\Floor;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Floor\Floor
     */
    protected $floors;

    /**
     * @param App\Models\Floor\Floor $floors
     */
    public function __construct($floors)
    {
        $this->floors = $floors;
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
        return view('backend.floors.edit')->with([
            'floors' => $this->floors
        ]);
    }
}