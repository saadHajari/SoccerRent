<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
  public function clubs()
    {
        return $this->hasMany('App\Club');
    }

    
}
