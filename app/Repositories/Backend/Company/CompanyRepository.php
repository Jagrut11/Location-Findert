<?php

namespace App\Repositories\Backend\Company;

use DB;
use Carbon\Carbon;
use App\Models\Company\Company;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyRepository.
 */
class CompanyRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Company::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.companies.table').'.id',
                config('module.companies.table').'.company_name',
                config('module.companies.table').'.created_at',
                config('module.companies.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Company::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.companies.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Company $company
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Company $company, array $input)
    {
    	if ($company->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.companies.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Company $company
     * @throws GeneralException
     * @return bool
     */
    public function delete(Company $company)
    {
        if ($company->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.companies.delete_error'));
    }
}
