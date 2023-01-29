<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeterrain extends Model
{ 

   public function terrains()
    {
        return $this->hasMany('App\Terrain');
    } 
  
}
