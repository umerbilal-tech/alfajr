<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Group;
use App\Section;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function class_groups($id){
    	$groups=Group::where('class_id',$id)->get();
    	return response()->json(['status'=>true,'groups'=>$groups]);
	}

	public function group_sections($id){
    	$sections=Section::where('group_id',$id)->get();
    	return response()->json(['status'=>true,'sections'=>$sections]);
	}

	public function section_students($id){
    	$students=Student::where('section_id',$id)->get();
    	$subjects=Subject::where('section_id',$id)->get();
    	return response()->json(['status'=>true,'students'=>$students,'subjects'=>$subjects]);
	}

	public function get_fee($id){
    	$fee=Fee::where('section_id',$id)->first();
    	return response()->json(['status'=>true,'fee'=>$fee]);
	}
}
