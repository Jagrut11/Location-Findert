<?php

namespace App\Models\Branch\Traits;

/**
 * Class BranchRelationship
 */
trait BranchRelationship
{
            public function companies()
    {
        //return $this->belongsTo(Branch::class,'company_id');
        //return $this->belongsTo(Company::class ,'companies_table','id');
        return $this->belongsTo(config('access.company'), config('access.companies_table'), 'id');
    }
    /*
    * put you model relationships here
    * Take below example for reference
    */
    /*
    public function users() {
        //Note that the below will only work if user is represented as user_id in your table
        //otherwise you have to provide the column name as a parameter
        //see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
        $this->belongsTo(User::class);
    }
     */
}
