<?php

namespace App\Repositories\Backend\Floor;

use DB;
use Carbon\Carbon;
use App\Models\Floor\Floor;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FloorRepository.
 */
class FloorRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Floor::class;

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
                config('module.floors.table').'.id',
                config('module.floors.table').'.branch_id',
                config('module.floors.table').'.company_id',
                config('module.floors.table').'.created_at',
                config('module.floors.table').'.updated_at',
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
        if (Floor::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.floors.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Floor $floor
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Floor $floor, array $input)
    {
    	if ($floor->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.floors.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Floor $floor
     * @throws GeneralException
     * @return bool
     */
    public function delete(Floor $floor)
    {
        if ($floor->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.floors.delete_error'));
    }
}
