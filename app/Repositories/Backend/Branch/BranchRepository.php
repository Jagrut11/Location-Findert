<?php

namespace App\Repositories\Backend\Branch;

use DB;
use Carbon\Carbon;
use App\Models\Branch\Branch;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Repositories\Backend\Company\CompanyRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BranchRepository.
 */
class BranchRepository extends BaseRepository
{
     /**
     * Associated Repository Model.
     */
    const MODEL = Branch::class;

    
    public function __construct(Branch $model, CompanyRepository $company)
    {
        $this->model = $model;
        $this->company = $company;
    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
   public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('companies','companies.id','=','branches.company_id')
            ->select([
                config('module.branches.table').'.id',
                config('module.branches.table').'.branch_name',
                //config('module.branches.table').'.company_id',
                config('module.branches.table').'.created_at',
                config('module.branches.table').'.updated_at',
                DB::raw('GROUP_CONCAT(companies.company_name) as companies'),
            ])
            ->groupBy('branches.id');
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
        //dd($input);
        if (Branch::create($input)) {
        //$company = $request->get('assign_company');     
           return true;
        }
        throw new GeneralException(trans('exceptions.backend.branches.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Branch $branch
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Branch $branch, array $input)
    {
    	if ($branch->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.branches.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Branch $branch
     * @throws GeneralException
     * @return bool
     */
    public function delete(Branch $branch)
    {
        if ($branch->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.branches.delete_error'));
    }
}
