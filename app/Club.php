<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Club extends Model
{
	


    public function admin(){
        
        return $this->belongsTo('App\Admin');
    }

   public function ville(){
        
        return $this->belongsTo('App\Ville');
    } 

    public function terrains()
    {
        return $this->hasMany('App\Terrain');
    }

   
}
