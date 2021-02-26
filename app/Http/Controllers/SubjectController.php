<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Group;
use App\Section;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$subjects=Subject::where('campus_id',Session::get('campus_id'))->orderBy('class_id','asc')->get();
		return view('admin.subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.subject.create',compact('classes'));
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
			"name"=>"required",
			"code"=>"required"
		]);

			$subject=new Subject();
			$subject->campus_id=Session::get('campus_id');
			$subject->class_id=$request->class_id;
			$subject->group_id=$request->group_id;
			$subject->section_id=$request->section_id;
			$subject->name=$request->name;
			$subject->code=$request->code;
			if($subject->save()){
				return back()->with('message','Subject Added');
			}else{

				return back()->with('hasError','Error Occurred');
			}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		$groups=Group::where('class_id',$subject->class_id)->get();
		$sections=Section::where('group_id',$subject->group_id)->get();
		return view('admin.subject.edit',compact('classes','groups','sections','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
		$request->validate([
			"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required",
			"name"=>"required",
			"code"=>"required",
		]);

		$subject->class_id=$request->class_id;
		$subject->group_id=$request->group_id;
		$subject->section_id=$request->section_id;
		$subject->name=$request->name;
		$subject->code=$request->code;
			if($subject->save()){
				return back()->with('message','Subject Updated');
			}else{

				return back()->with('hasError','Error Occurred');
			}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
