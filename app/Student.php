<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
	public function class(){
		return $this->belongsTo('App\Classes');
	}

	public function group(){
		return $this->belongsTo('App\Group');
	}
	public function section(){
		return $this->belongsTo('App\Section');
	}
	public function fee_group(){
		return $this->belongsTo('App\FeeGroup');
	}

	public function struck_off(){
		return StruckOff::where('student_id',$this->id)->get()->last();
	}
	public function left(){
		return LeavingRecord::where('student_id',$this->id)->get()->last();
	}
}
