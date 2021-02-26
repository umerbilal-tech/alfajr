<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Classes;
use App\Group;
use App\Section;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChallanController extends Controller
{
	public function index(){
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.challans.index',compact('classes'));
	}

	public function all_fee(){
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.challans.all',compact('classes'));
	}

	public function generate(Request $request){

       $student=Student::findorfail($request->student_id);
       $campus=Campus::findorfail($student->campus_id);
       $fee_month=new \DateTime($request->fee_month);
       return view('admin.challans.fee1',compact('student','request','campus','fee_month'));
	}

	public function generate_all(Request $request){

		$students=Student::where('section_id',$request->section_id)->get();

		$campus=Campus::findorfail(Session::get('campus_id'));
		$fee_month=new \DateTime($request->fee_month);
		return view('admin.challans.all_fees',compact('students','request','fee_month','campus'));
	}
}
