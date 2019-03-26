<?php

namespace App\Repositories\Backend\Seat;

use DB;
use Carbon\Carbon;
use App\Models\Seat\Seat;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeatRepository.
 */
class SeatRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Seat::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('floors','floors.id','=','seats.floor_id')
            ->select([
                config('module.seats.table').'.id',
                config('module.seats.table').'.seat_no',
                config('module.seats.table').'.created_at',
                config('module.seats.table').'.updated_at',
                 DB::raw('GROUP_CONCAT(floors.floor_no) as floors'),
            ])
            ->groupBy('seats.id');
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
        if (Seat::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.seats.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Seat $seat
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Seat $seat, array $input)
    {
    	if ($seat->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.seats.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Seat $seat
     * @throws GeneralException
     * @return bool
     */
    public function delete(Seat $seat)
    {
        if ($seat->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.seats.delete_error'));
    }
}
