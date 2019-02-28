<?php

namespace App\Models\Floor\Traits;

/**
 * Class FloorAttribute.
 */
trait FloorAttribute
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
                '.$this->getEditButtonAttribute("edit-floor", "admin.floors.edit").'
                '.$this->getDeleteButtonAttribute("delete-floor", "admin.floors.destroy").'
                </div>';
    }
}
