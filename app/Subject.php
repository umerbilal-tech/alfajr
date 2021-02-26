<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	public function class(){
		return $this->belongsTo('App\Classes');
	}

	public function group(){
		return $this->belongsTo('App\Group');
	}
	public function section(){
		return $this->belongsTo('App\Section');
	}
}
