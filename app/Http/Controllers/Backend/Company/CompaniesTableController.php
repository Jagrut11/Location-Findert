<?php

namespace App\Http\Controllers\Backend\Company;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Company\CompanyRepository;
use App\Http\Requests\Backend\Company\ManageCompanyRequest;

/**
 * Class CompaniesTableController.
 */
class CompaniesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CompanyRepository
     */
    protected $company;

    /**
     * contructor to initialize repository object
     * @param CompanyRepository $company;
     */
    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    /**
     * This method return the data of the model
     * @param ManageCompanyRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCompanyRequest $request)
    {
        return Datatables::of($this->company->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($company) {
                return Carbon::parse($company->created_at)->toDateString();
            })
            ->addColumn('actions', function ($company) {
                return $company->action_buttons;
            })
            ->make(true);
    }
}
