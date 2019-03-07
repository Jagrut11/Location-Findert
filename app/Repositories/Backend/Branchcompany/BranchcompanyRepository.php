<?php

namespace App\Repositories\Backend\Branchcompany;

use DB;
use Carbon\Carbon;
use App\Models\Branchcompany\Branchcompany;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BranchcompanyRepository.
 */
class BranchcompanyRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Branchcompany::class;

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
                config('module.branchcompanies.table').'.id',
                config('module.branchcompanies.table').'.created_at',
                config('module.branchcompanies.table').'.updated_at',
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
        if (Branchcompany::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.branchcompanies.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Branchcompany $branchcompany
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Branchcompany $branchcompany, array $input)
    {
    	if ($branchcompany->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.branchcompanies.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Branchcompany $branchcompany
     * @throws GeneralException
     * @return bool
     */
    public function delete(Branchcompany $branchcompany)
    {
        if ($branchcompany->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.branchcompanies.delete_error'));
    }
}
