<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
   public function student(){
   	return $this->belongsTo('App\Student');
   }
}
