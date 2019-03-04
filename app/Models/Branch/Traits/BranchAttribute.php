<?php

namespace App\Models\Branch\Traits;

/**
 * Class BranchAttribute.
 */
trait BranchAttribute
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
                '.$this->getEditButtonAttribute("edit-branch", "admin.branches.edit").'
                '.$this->getDeleteButtonAttribute("delete-branch", "admin.branches.destroy").'
                </div>';
    }
}
