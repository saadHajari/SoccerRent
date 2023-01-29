<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function terrain(){
        
        return $this->belongsTo('App\Terrain');
    }

    public function delegate(){
        
        return $this->belongsTo('App\Delegate') ;
    }



}
