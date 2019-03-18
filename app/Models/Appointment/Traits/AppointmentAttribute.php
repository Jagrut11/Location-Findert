<?php

namespace App\Models\Appointment\Traits;

/**
 * Class AppointmentAttribute.
 */
trait AppointmentAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-appointment", "admin.appointments.edit").'
                '.$this->getDeleteButtonAttribute("delete-appointment", "admin.appointments.destroy").'
                </div>';
    }
}
