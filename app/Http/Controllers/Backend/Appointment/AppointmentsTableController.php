<?php

namespace App\Http\Controllers\Backend\Appointment;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Appointment\AppointmentRepository;
use App\Http\Requests\Backend\Appointment\ManageAppointmentRequest;

/**
 * Class AppointmentsTableController.
 */
class AppointmentsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AppointmentRepository
     */
    protected $appointment;

    /**
     * contructor to initialize repository object
     * @param AppointmentRepository $appointment;
     */
    public function __construct(AppointmentRepository $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * This method return the data of the model
     * @param ManageAppointmentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAppointmentRequest $request)
    {
        return Datatables::of($this->appointment->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($appointment) {
                return Carbon::parse($appointment->created_at)->toDateString();
            })
            ->addColumn('actions', function ($appointment) {
                return $appointment->action_buttons;
            })
            ->make(true);
    }
}
