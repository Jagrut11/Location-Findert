<?php

namespace App\Http\Responses\Backend\Company;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Company\Company
     */
    protected $companies;

    /**
     * @param App\Models\Company\Company $companies
     */
    public function __construct($companies)
    {
        $this->companies = $companies;
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
        return view('backend.companies.edit')->with([
            'companies' => $this->companies
        ]);
    }
}