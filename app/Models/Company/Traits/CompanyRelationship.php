<?php

namespace App\Models\Company\Traits;

/**
 * Class CompanyRelationship
 */
trait CompanyRelationship
{
    
         public function branches()
     {
        //return $this->belongsTo(Branch::class,'company_id');
        //return $this->belongsTo(Branch::class ,'branches_table','company_id');
        return $this->belongsToMany(config('access.branch'), config('access.branches_table'),'id','company_name');
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
