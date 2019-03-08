<?php

namespace App\Models\Branch;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\Traits\BranchAttribute;
use App\Models\Branch\Traits\BranchRelationship;

class Branch extends Model
{
    use ModelTrait,
        BranchAttribute,
    	BranchRelationship {
            // BranchAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'branches';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'branch_name',
        'company_id'

    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
   
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('modules.branches.table');
       // return Company::where('id',$this->company_id);
    }
}
