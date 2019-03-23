<?php

namespace App\Http\Controllers\Backend\Appointment;

use App\Models\Appointment\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Appointment\CreateResponse;
use App\Http\Responses\Backend\Appointment\EditResponse;
use App\Repositories\Backend\Appointment\AppointmentRepository;
use App\Http\Requests\Backend\Appointment\ManageAppointmentRequest;
use App\Http\Requests\Backend\Appointment\CreateAppointmentRequest;
use App\Http\Requests\Backend\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Backend\Appointment\EditAppointmentRequest;
use App\Http\Requests\Backend\Appointment\UpdateAppointmentRequest;
use App\Http\Requests\Backend\Appointment\DeleteAppointmentRequest;

/**
 * AppointmentsController
 */
class AppointmentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AppointmentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AppointmentRepository $repository;
     */
    public function __construct(AppointmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Appointment\ManageAppointmentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAppointmentRequest $request)
    {
        return new ViewResponse('backend.appointments.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAppointmentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Appointment\CreateResponse
     */
    public function create(CreateAppointmentRequest $request)
    {
        return new CreateResponse('backend.appointments.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAppointmentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAppointmentRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.appointments.index'), ['flash_success' => trans('alerts.backend.appointments.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Appointment\Appointment  $appointment
     * @param  EditAppointmentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Appointment\EditResponse
     */
    public function edit(Appointment $appointment, EditAppointmentRequest $request)
    {
        return new EditResponse($appointment);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAppointmentRequestNamespace  $request
     * @param  App\Models\Appointment\Appointment  $appointment
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $appointment, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.appointments.index'), ['flash_success' => trans('alerts.backend.appointments.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAppointmentRequestNamespace  $request
     * @param  App\Models\Appointment\Appointment  $appointment
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Appointment $appointment, DeleteAppointmentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($appointment);
        //returning with successfull message
        return new RedirectResponse(route('admin.appointments.index'), ['flash_success' => trans('alerts.backend.appointments.deleted')]);
    }
    
}
