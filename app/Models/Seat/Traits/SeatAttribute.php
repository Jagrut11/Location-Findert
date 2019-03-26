<?php

namespace App\Models\Seat\Traits;

/**
 * Class SeatAttribute.
 */
trait SeatAttribute
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
                '.$this->getEditButtonAttribute("edit-seat", "admin.seats.edit").'
                '.$this->getDeleteButtonAttribute("delete-seat", "admin.seats.destroy").'
                </div>';
    }
}
