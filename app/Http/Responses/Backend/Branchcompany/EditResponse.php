<?php

namespace App\Http\Responses\Backend\Branchcompany;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Branchcompany\Branchcompany
     */
    protected $branchcompanies;

    /**
     * @param App\Models\Branchcompany\Branchcompany $branchcompanies
     */
    public function __construct($branchcompanies)
    {
        $this->branchcompanies = $branchcompanies;
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
        return view('backend.branchcompanies.edit')->with([
            'branchcompanies' => $this->branchcompanies
        ]);
    }
}