<?php

namespace App\Repositories\Backend\Appointment;

use DB;
use Carbon\Carbon;
use App\Models\Appointment\Appointment;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppointmentRepository.
 */
class AppointmentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Appointment::class;

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
                config('module.appointments.table').'.id',
                config('module.appointments.table').'.created_at',
                config('module.appointments.table').'.updated_at',
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
        if (Appointment::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.appointments.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Appointment $appointment
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Appointment $appointment, array $input)
    {
    	if ($appointment->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.appointments.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Appointment $appointment
     * @throws GeneralException
     * @return bool
     */
    public function delete(Appointment $appointment)
    {
        if ($appointment->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.appointments.delete_error'));
    }
}
