<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Exam;
use App\Group;
use App\Section;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$exams=Exam::where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('section_id',$request->section_id)->where('date',$request->date)->get();

		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
       return view('admin.exam.index',compact('classes','exams'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.exam.create',compact('classes'));
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
        	"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required",
			"student_id"=>"required",
			"name"=>"required",
			"date"=>"required",
		]);
        $result_arr=[];
        if($request->has('subject_id')  && count($request->subject_id)>0){
        	$subjects=$request->subject_id;
			$totals=$request->total;
			$obtaineds=$request->obtained;
        	for($i=0;$i<count($subjects);$i++){
				$result_arr[]=array('subject_id'=>$subjects[$i],
					'total'=>$totals[$i],
					'obtained'=>$obtaineds[$i]
				);
			}
		}else{
			return back()->with('hasError','Cannot add exam with no subjects');
		}

        $exam=new Exam();
        $exam->campus_id=Session::get('campus_id');
        $exam->class_id=$request->class_id;
		$exam->group_id=$request->group_id;
		$exam->section_id=$request->section_id;
		$exam->student_id=$request->student_id;
		$exam->name=$request->name;
		$exam->date=$request->date;
		$exam->result=json_encode($result_arr);
		if($exam->save()){
			return back()->with('message','Exam added Successfully');
		}else{
			return back()->with('hasError','Error Occurred');
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
       return view('admin.exam.show',compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		$groups=Group::where('class_id',$exam->class_id)->get();
		$sections=Section::where('group_id',$exam->group_id)->get();
		$students=Student::where('section_id',$exam->section_id)->get();
		return view('admin.exam.edit',compact('classes','groups','sections','students','exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
		$request->validate([
			"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required",
			"student_id"=>"required",
			"name"=>"required",
			"date"=>"required",
		]);
		$result_arr=[];
		if($request->has('subject_id')  && count($request->subject_id)>0){
			$subjects=$request->subject_id;
			$totals=$request->total;
			$obtaineds=$request->obtained;
			for($i=0;$i<count($subjects);$i++){
				$result_arr[]=array('subject_id'=>$subjects[$i],
					'total'=>$totals[$i],
					'obtained'=>$obtaineds[$i]
				);
			}
		}else{
			return back()->with('hasError','Cannot add exam with no subjects');
		}


		$exam->class_id=$request->class_id;
		$exam->group_id=$request->group_id;
		$exam->section_id=$request->section_id;
		$exam->student_id=$request->student_id;
		$exam->name=$request->name;
		$exam->date=$request->date;
		$exam->result=json_encode($result_arr);
		if($exam->save()){
			return back()->with('message','Exam updated Successfully');
		}else{
			return back()->with('hasError','Error Occurred');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {

      if($exam->delete()){
      	return back()->with('message','Exam Deleted');
	  }else{
      	return back()->with('hasError','Error');
	  }
    }
}
