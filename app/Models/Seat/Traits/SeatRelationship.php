<?php

namespace App\Models\Seat\Traits;

/**
 * Class SeatRelationship
 */
trait SeatRelationship
{
    
      public function users()
    {
        
         return $this->hasOne(User::class, 'id', 'seat_no');
    }


      public function floors()
    {
        
         return $this->hasOne(Floor::class, 'id', 'floor_id');
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
