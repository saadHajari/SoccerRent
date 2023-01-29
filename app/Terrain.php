<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    

 public function typeterrain(){
        
        return $this->belongsTo('App\Typeterrain');
    }

public function club(){
        
        return $this->belongsTo('App\Club');
    }
    
 public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

}
