<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classes;
use App\Group;
use App\Section;
use App\Student;
use App\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	$attendance=Attendance::where('section_id',$request->section_id)->where('date',$request->date)->first();

	    $classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.attendance.index',compact('classes','attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.attendance.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        	'class_id'=>'required',
			'group_id'=>'required',
			'section_id'=>'required',
			'date'=>'required',
		]);

        $check=Attendance::where('section_id',$request->section_id)->where('date',$request->date)->first();
        if($check){
        	return back()->with('hasError','Attendance already taken');
		}else{
			$attendance=new Attendance();
			$attendance->campus_id=Session::get('campus_id');
			$attendance->class_id=$request->class_id;
			$attendance->group_id=$request->group_id;
			$attendance->section_id=$request->section_id;
			$attendance->date=$request->date;

			$attendance->save();

			$students=Student::where('section_id',$request->section_id)->whereIn('state',['studying','readmission'])->get();
			foreach ($students as $student){
				$obj=new StudentAttendance();
				$obj->attendance_id=$attendance->id;
				$obj->student_id=$student->id;
				if(in_array($student->id,$request->students)){
					$obj->status="absent";
				}else{
					$obj->status="present";
				}
				$obj->save();
			}

			return back()->with('message','Attendance Marked Successfully');
		}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
    	$groups=Group::where('class_id',$attendance->class_id)->get();
    	$sections=Section::where('group_id',$attendance->group_id)->get();
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		$students=Student::where('section_id',$attendance->section_id)->get();
		return view('admin.attendance.edit',compact('classes','groups','sections','attendance','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
		$request->validate([
			'class_id'=>'required',
			'group_id'=>'required',
			'section_id'=>'required',
			'date'=>'required',
		]);

		$check=Attendance::where('section_id',$request->section_id)->where('date',$request->date)->first();

			$attendance=$check;

			$attendance->class_id=$request->class_id;
			$attendance->group_id=$request->group_id;
			$attendance->section_id=$request->section_id;
			$attendance->date=$request->date;

			$attendance->save();

			foreach ($attendance->students as $student){
				$student->delete();
			}

			$students=Student::where('section_id',$request->section_id)->whereIn('state',['studying','readmission'])->get();
			foreach ($students as $student){
				$obj=new StudentAttendance();
				$obj->attendance_id=$attendance->id;
				$obj->student_id=$student->id;
				if(in_array($student->id,$request->students)){
					$obj->status="absent";
				}else{
					$obj->status="present";
				}
				$obj->save();
			}

			return back()->with('message','Attendance Updated Successfully');


	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {

    }
}
