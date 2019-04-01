<?php

namespace App\Http\Responses\Backend\Branch;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Branch\Branch
     */
    protected $branch;



    /**
     * @param App\Models\Branch\Branch $branches
     */
    public function __construct($branch)
    {
        $this->branch = $branch;
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
        return view('backend.branches.edit')->with([
            'branch' => $this->branch
        ]);
    }
}