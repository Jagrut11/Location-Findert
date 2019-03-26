<?php

namespace App\Models\Branch\Traits;

/**
 * Class BranchRelationship
 */
trait BranchRelationship
{
            public function companies()
    {
        
         return $this->hasOne(Company::class, 'id', 'company_id');
    }
     public function floors()
     {
        //return $this->belongsTo(Branch::class,'company_id');
        //return $this->belongsTo(Branch::class ,'branches_table','company_id');
        return $this->belongsToMany(config('access.floor'), config('access.floors_table'),'id','branch_name');
    }
<<<<<<< HEAD

    public function users()
     {
        //return $this->belongsTo(Branch::class,'company_id');
        //return $this->belongsTo(Branch::class ,'branches_table','company_id');
        return $this->belongsToMany(config('access.users'), config('access.users_table'),'id','branch_name');
    }
=======
>>>>>>> 2a276e59120dada48f8f80afa737a5a4afe06363
    
   

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
