<?php

namespace App\Http\Controllers\Backend\Floor;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Floor\FloorRepository;
use App\Http\Requests\Backend\Floor\ManageFloorRequest;

/**
 * Class FloorsTableController.
 */
class FloorsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var FloorRepository
     */
    protected $floor;

    /**
     * contructor to initialize repository object
     * @param FloorRepository $floor;
     */
    public function __construct(FloorRepository $floor)
    {
        $this->floor = $floor;
    }

    /**
     * This method return the data of the model
     * @param ManageFloorRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFloorRequest $request)
    {
        return Datatables::of($this->floor->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($floor) {
                return Carbon::parse($floor->created_at)->toDateString();
            })
            ->addColumn('actions', function ($floor) {
                return $floor->action_buttons;
            })
            ->make(true);
    }
}
