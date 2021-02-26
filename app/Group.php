<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   public function class(){
   	return $this->belongsTo('App\Classes');
   }
}
