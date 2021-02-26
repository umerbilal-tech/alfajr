<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	public function class(){
		return $this->belongsTo('App\Classes','class_id');
	}

	public function group(){
		return $this->belongsTo('App\Group');
	}
	public function section(){
		return $this->belongsTo('App\Section');
	}

	public function student(){
		return $this->belongsTo('App\Student');
	}
}
