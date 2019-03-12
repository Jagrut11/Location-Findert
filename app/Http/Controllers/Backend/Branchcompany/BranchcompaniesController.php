<?php

namespace App\Http\Controllers\Backend\Branchcompany;

use App\Models\Branchcompany\Branchcompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Branchcompany\CreateResponse;
use App\Http\Responses\Backend\Branchcompany\EditResponse;
use App\Repositories\Backend\Branchcompany\BranchcompanyRepository;
use App\Http\Requests\Backend\Branchcompany\ManageBranchcompanyRequest;
use App\Http\Requests\Backend\Branchcompany\CreateBranchcompanyRequest;
use App\Http\Requests\Backend\Branchcompany\StoreBranchcompanyRequest;
use App\Http\Requests\Backend\Branchcompany\EditBranchcompanyRequest;
use App\Http\Requests\Backend\Branchcompany\UpdateBranchcompanyRequest;
use App\Http\Requests\Backend\Branchcompany\DeleteBranchcompanyRequest;

/**
 * BranchcompaniesController
 */
class BranchcompaniesController extends Controller
{
    /**
     * variable to store the repository object
     * @var BranchcompanyRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BranchcompanyRepository $repository;
     */
    public function __construct(BranchcompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Branchcompany\ManageBranchcompanyRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBranchcompanyRequest $request)
    {
        return new ViewResponse('backend.branchcompanies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBranchcompanyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Branchcompany\CreateResponse
     */
    public function create(CreateBranchcompanyRequest $request)
    {
        return new CreateResponse('backend.branchcompanies.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBranchcompanyRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBranchcompanyRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.branchcompanies.index'), ['flash_success' => trans('alerts.backend.branchcompanies.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Branchcompany\Branchcompany  $branchcompany
     * @param  EditBranchcompanyRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Branchcompany\EditResponse
     */
    public function edit(Branchcompany $branchcompany, EditBranchcompanyRequest $request)
    {
        return new EditResponse($branchcompany);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBranchcompanyRequestNamespace  $request
     * @param  App\Models\Branchcompany\Branchcompany  $branchcompany
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBranchcompanyRequest $request, Branchcompany $branchcompany)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $branchcompany, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.branchcompanies.index'), ['flash_success' => trans('alerts.backend.branchcompanies.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBranchcompanyRequestNamespace  $request
     * @param  App\Models\Branchcompany\Branchcompany  $branchcompany
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Branchcompany $branchcompany, DeleteBranchcompanyRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($branchcompany);
        //returning with successfull message
        return new RedirectResponse(route('admin.branchcompanies.index'), ['flash_success' => trans('alerts.backend.branchcompanies.deleted')]);
    }
    
}
