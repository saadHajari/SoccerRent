<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    public function adherants()
    {
        return $this->hasMany('App\Adherant');
    }

   public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
   
}
