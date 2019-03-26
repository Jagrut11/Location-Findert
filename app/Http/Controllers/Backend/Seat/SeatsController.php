<?php

namespace App\Http\Controllers\Backend\Seat;

use App\Models\Seat\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Seat\CreateResponse;
use App\Http\Responses\Backend\Seat\EditResponse;
use App\Repositories\Backend\Seat\SeatRepository;
use App\Repositories\Backend\Floor\FloorRepository;
use App\Http\Requests\Backend\Seat\ManageSeatRequest;
use App\Http\Requests\Backend\Seat\CreateSeatRequest;
use App\Http\Requests\Backend\Seat\StoreSeatRequest;
use App\Http\Requests\Backend\Seat\EditSeatRequest;
use App\Http\Requests\Backend\Seat\UpdateSeatRequest;
use App\Http\Requests\Backend\Seat\DeleteSeatRequest;

/**
 * SeatsController
 */
class SeatsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SeatRepository
     */
    protected $seat;

     /**
     * variable to store the repository object
     * @var SeatRepository
     */
    protected $floor;

    /**
     * contructor to initialize repository object
     * @param SeatRepository $repository;
     */
    public function __construct(SeatRepository $seat, FloorRepository $floor)
    {
        $this->seat = $seat;
        $this->floor = $floor;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Seat\ManageSeatRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSeatRequest $request)
    {
        return new ViewResponse('backend.seats.index');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSeatRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Seat\CreateResponse
     */
    public function create(CreateSeatRequest $request)
    {
        $floor['floor']=$this->floor->getAll();
        //return new CreateResponse('backend.seats.create');
        return view('backend.seats.create',$floor);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSeatRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSeatRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->seat->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.seats.index'), ['flash_success' => trans('alerts.backend.seats.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Seat\Seat  $seat
     * @param  EditSeatRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Seat\EditResponse
     */
    public function edit(Seat $seat, EditSeatRequest $request)
    {
        return new EditResponse($seat);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSeatRequestNamespace  $request
     * @param  App\Models\Seat\Seat  $seat
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->seat->update( $seat, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.seats.index'), ['flash_success' => trans('alerts.backend.seats.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSeatRequestNamespace  $request
     * @param  App\Models\Seat\Seat  $seat
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Seat $seat, DeleteSeatRequest $request)
    {
        //Calling the delete method on repository
        $this->seat->delete($seat);
        //returning with successfull message
        return new RedirectResponse(route('admin.seats.index'), ['flash_success' => trans('alerts.backend.seats.deleted')]);
    }
    
}
