<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Classes;
use App\Fee;
use App\Group;
use App\Section;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function student_enrollment(){
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
    	return view('admin.reports.student_enrolment',compact('classes'));
	}

	public function get_student_enrollment(Request $request){
    	$request->validate([
    		"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required"
		]);
    	$campus=Campus::findorfail(Session::get('campus_id'));
    	$class=Classes::find($request->class_id);
    	$group=Group::find($request->group_id);
    	$section=Section::find($request->section_id);
    	$fee=Fee::where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('section_id',$request->section_id)->first();
    	$students=Student::where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('section_id',$request->section_id)->get();
    	return view('admin.reports.get_student_enrollment',compact('students','campus','class','group','section','fee'));
	}
}
