<?php

namespace App\Http\Controllers\Backend\Branchcompany;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Branchcompany\BranchcompanyRepository;
use App\Http\Requests\Backend\Branchcompany\ManageBranchcompanyRequest;

/**
 * Class BranchcompaniesTableController.
 */
class BranchcompaniesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BranchcompanyRepository
     */
    protected $branchcompany;

    /**
     * contructor to initialize repository object
     * @param BranchcompanyRepository $branchcompany;
     */
    public function __construct(BranchcompanyRepository $branchcompany)
    {
        $this->branchcompany = $branchcompany;
    }

    /**
     * This method return the data of the model
     * @param ManageBranchcompanyRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBranchcompanyRequest $request)
    {
        return Datatables::of($this->branchcompany->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($branchcompany) {
                return Carbon::parse($branchcompany->created_at)->toDateString();
            })
            ->addColumn('actions', function ($branchcompany) {
                return $branchcompany->action_buttons;
            })
            ->make(true);
    }
}
