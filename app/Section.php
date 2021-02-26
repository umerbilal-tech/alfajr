<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function class(){
    	return $this->belongsTo('App\Classes');
	}

	public function group(){
    	return $this->belongsTo('App\Group');
	}
}
