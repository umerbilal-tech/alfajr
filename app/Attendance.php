<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function students(){
    	return $this->hasMany('App\StudentAttendance');
	}

	public function _class(){
    	return $this->belongsTo('App\Classes','class_id');
	}

	public function group(){
    	return $this->belongsTo('App\Group');
	}

	public function section(){
    	return $this->belongsTo('App\Section');
	}
}
