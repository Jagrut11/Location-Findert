<?php

namespace App\Http\Controllers\Backend\Seat;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Seat\SeatRepository;
use App\Http\Requests\Backend\Seat\ManageSeatRequest;

/**
 * Class SeatsTableController.
 */
class SeatsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SeatRepository
     */
    protected $seat;

    /**
     * contructor to initialize repository object
     * @param SeatRepository $seat;
     */
    public function __construct(SeatRepository $seat)
    {
        $this->seat = $seat;
    }

    /**
     * This method return the data of the model
     * @param ManageSeatRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSeatRequest $request)
    {
        return Datatables::of($this->seat->getForDataTable())
            ->escapeColumns(['id'])

            ->addColumn('floor_id', function ($seat) {
                return $seat->floor_id;
            })
            ->addColumn('created_at', function ($seat) {
                return Carbon::parse($seat->created_at)->toDateString();
            })
            ->addColumn('actions', function ($seat) {
                return $seat->action_buttons;
            })
            ->make(true);
    }
}
