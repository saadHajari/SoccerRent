<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adherant extends Model
{
    
public function delegate()
   {
        
        return $this->belongsTo('App\Delegate')  ; 
    }
    
}
