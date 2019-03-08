<?php

namespace App\Http\Controllers\Backend\Company;

use App\Models\Company\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Company\CreateResponse;
use App\Http\Responses\Backend\Company\EditResponse;
use App\Repositories\Backend\Company\CompanyRepository;
use App\Http\Requests\Backend\Company\ManageCompanyRequest;
use App\Http\Requests\Backend\Company\CreateCompanyRequest;
use App\Http\Requests\Backend\Company\StoreCompanyRequest;
use App\Http\Requests\Backend\Company\EditCompanyRequest;
use App\Http\Requests\Backend\Company\UpdateCompanyRequest;
use App\Http\Requests\Backend\Company\DeleteCompanyRequest;

/**
 * CompaniesController
 */
class CompaniesController extends Controller
{
    /**
     * variable to store the repository object
     * @var CompanyRepository
     */
    protected $company;

    /**
     * contructor to initialize repository object
     * @param CompanyRepository $repository;
     */
    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Company\ManageCompanyRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCompanyRequest $request)
    {
        return new ViewResponse('backend.companies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCompanyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Company\CreateResponse
     */
    public function create(CreateCompanyRequest $request)
    {

        return new CreateResponse('backend.companies.create');
    }

        // return new CreateResponse('backend.companies.create');
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompanyRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCompanyRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->company->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.companies.index'), ['flash_success' => trans('alerts.backend.companies.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Company\Company  $company
     * @param  EditCompanyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Company\EditResponse
     */
    public function edit(Company $company, EditCompanyRequest $request)
    {
        return new EditResponse($company);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompanyRequestNamespace  $request
     * @param  App\Models\Company\Company  $company
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->company->update( $company, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.companies.index'), ['flash_success' => trans('alerts.backend.companies.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCompanyRequestNamespace  $request
     * @param  App\Models\Company\Company  $company
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Company $company, DeleteCompanyRequest $request)
    {
        //Calling the delete method on repository
        $this->company->delete($company);
        //returning with successfull message
        return new RedirectResponse(route('admin.companies.index'), ['flash_success' => trans('alerts.backend.companies.deleted')]);
    }
    
}
//CreateCompanyRequest user for giving rules nd access
