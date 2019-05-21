<?php

namespace App\Http\Controllers\Backend\Floor;
use DB;
use App\Models\Branch\Branch;
use App\Models\Company\Company;
use App\Models\Floor\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Floor\CreateResponse;
use App\Http\Responses\Backend\Floor\EditResponse;
use App\Repositories\Backend\Floor\FloorRepository;
use App\Repositories\Backend\Company\CompanyRepository;
use App\Repositories\Backend\Branch\BranchRepository;
use App\Http\Requests\Backend\Floor\ManageFloorRequest;
use App\Http\Requests\Backend\Floor\CreateFloorRequest;
use App\Http\Requests\Backend\Floor\StoreFloorRequest;
use App\Http\Requests\Backend\Floor\EditFloorRequest;
use App\Http\Requests\Backend\Floor\UpdateFloorRequest;
use App\Http\Requests\Backend\Floor\DeleteFloorRequest;

/**
 * FloorsController
 */
class FloorsController extends Controller
{
    /**
     * variable to store the repository object
     * @var FloorRepository
     */
    protected $repository;
   
    protected $branch; 

    /**
     * contructor to initialize repository object
     * @param FloorRepository $repository;
     */
    public function __construct(FloorRepository $floor , BranchRepository $branch)
    {
        $this->floor=$floor;
        $this->branch=$branch;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Floor\ManageFloorRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageFloorRequest $request)
    {
        return new ViewResponse('backend.floors.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateFloorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Floor\CreateResponse
     */
    public function create(CreateFloorRequest $request)
    {
        $data = DB::table('branches')->get();
        $data1 = DB::table('floors')->get();
        return view('backend.floors.create',array('data'=>$data,'data1'=>$data1));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFloorRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreFloorRequest $request)
    {
        
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        
        $this->floor->create($input);
        //return with successfull message
         return new RedirectResponse(route('admin.floors.index'), ['flash_success' => trans('alerts.backend.floors.created')]);
        // return response()->json(['success'=>'Data is successfully added']);
    }

    public function updateJson(StoreFloorRequest $request)
    {
        $data=(json_decode($request->jsonData, true));
        $layout= $request->layoutImg;

        $input = $request->except(['_token']);


        $details = DB::table('floors')
        ->select('floors.id')
        ->where('branch_id', $request->session()->get('branch'))
        ->where('floor_no', $request->session()->get('floor'))
        ->get();
       
        //
                $path='C:/Users/admin/'.$layout;
                $request->session()->put('path', $path);
                //dd($request->session()->get('path'));

    $result=$details ? $details[0]->id : 0;
    //dd($result);
    //$something=move('C:/Users/admin/'.$layout,'/img/',$layout);
         $updateDetails=DB::table('floors')->where('id', $result)->update( [ 'layout' => $request->jsonData,'LayoutImg' => $request->layoutImg]);
         $request->session()->forget('branch');
        $request->session()->forget('floor');
    }   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Floor\Floor  $floor
     * @param  EditFloorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Floor\EditResponse
     */
    public function edit(Floor $floor, EditFloorRequest $request)
    {
        return new EditResponse($floor);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFloorRequestNamespace  $request
     * @param  App\Models\Floor\Floor  $floor
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->floor->update( $floor, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.floors.index'), ['flash_success' => trans('alerts.backend.floors.updated')]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteFloorRequestNamespace  $request
     * @param  App\Models\Floor\Floor  $floor
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Floor $floor, DeleteFloorRequest $request)
    {
        //Calling the delete method on repository
        $this->floor->delete($floor);
        //returning with successfull message
        return new RedirectResponse(route('admin.floors.index'), ['flash_success' => trans('alerts.backend.floors.deleted')]);
    }
    
}