<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Group;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$sections=Section::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $classes=Classes::where('campus_id',Session::get('campus_id'))->get();
       return view('admin.section.create',compact('classes'));
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
       	"name"=>"required",
		   "class_id"=>"required",
		   "group_id"=>"required"
	   ]);

       $section=new Section();
       $section->campus_id=Session::get('campus_id');
       $section->name=$request->name;
       $section->class_id=$request->class_id;
       $section->group_id=$request->group_id;
       if($section->save()){
       	return back()->with('message','Section Added');
	   }else{
       	return back()->with('hasError','Error');
	   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
    	$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
    	$groups=Group::where('class_id',$section->class_id)->get();
       return view('admin.section.edit',compact('section','classes','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
		$request->validate([
			"name"=>"required",
			"class_id"=>"required",
			"group_id"=>"required"
		]);

		$section->name=$request->name;
		$section->class_id=$request->class_id;
		$section->group_id=$request->group_id;
		if($section->save()){
			return back()->with('message','Section Updated');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
