<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.group.create',compact('classes'));
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
	   ]);
       $group=new Group();
       $group->campus_id=Session::get('campus_id');
       $group->name=$request->name;
       $group->class_id=$request->class_id;
       if($group->save()){
       	return back()->with('message','Group Added');
	   }else{
       	return back()->with('hasError','Error');
	   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.group.edit',compact('group','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
		$request->validate([
			"name"=>"required",
			"class_id"=>"required",
		]);
		$group->name=$request->name;
		$group->class_id=$request->class_id;
		if($group->save()){
			return back()->with('message','Group Updated');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
