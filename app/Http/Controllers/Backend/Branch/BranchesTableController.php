<?php

namespace App\Http\Controllers\Backend\Branch;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Branch\BranchRepository;
use App\Http\Requests\Backend\Branch\ManageBranchRequest;

/**
 * Class BranchesTableController.
 */
class BranchesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BranchRepository
     */
    protected $branch;

    /**
     * contructor to initialize repository object
     * @param BranchRepository $branch;
     */
    public function __construct(BranchRepository $branch)
    {
        $this->branch = $branch;
    }

    /**
     * This method return the data of the model
     * @param ManageBranchRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBranchRequest $request)
    {
        return Datatables::of($this->branch->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($branch) {
                return Carbon::parse($branch->created_at)->toDateString();
            })
            ->addColumn('actions', function ($branch) {
                return $branch->action_buttons;
            })
            ->make(true);
    }
}
