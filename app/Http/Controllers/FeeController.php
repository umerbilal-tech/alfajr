<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Fee;
use App\Group;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees=Fee::where('campus_id',Session::get('campus_id'))->orderBy('class_id','asc')->get();
        return view('admin.fees.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		return view('admin.fees.create',compact('classes'));
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
			"total_fee"=>"required"
		]);
        $check=Fee::where('section_id',$request->section_id)->first();
        if($check){
        	return back()->with('hasError','Fee Already Added along this section');
		}else{
        	$fee=new Fee();
        	$fee->campus_id=Session::get('campus_id');
        	$fee->class_id=$request->class_id;
        	$fee->group_id=$request->group_id;
        	$fee->section_id=$request->section_id;
        	$fee->fee=$request->total_fee;
        	if($fee->save()){
        		return back()->with('message','Fee Added');
			}else{

        		return back()->with('hasError','Error Occurred');
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		$groups=Group::where('class_id',$fee->class_id)->get();
		$sections=Section::where('group_id',$fee->group_id)->get();
		return view('admin.fees.edit',compact('classes','groups','sections','fee'));

	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
		$request->validate([
			"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required",
			"total_fee"=>"required"
		]);
		$check=Fee::where('section_id',$request->section_id)->where('id','!=',$fee->id)->first();
		if($check){
			return back()->with('hasError','Fee Already Added along this section');
		}else{
			$fee->campus_id=Session::get('campus_id');
			$fee->class_id=$request->class_id;
			$fee->group_id=$request->group_id;
			$fee->section_id=$request->section_id;
			$fee->fee=$request->total_fee;
			if($fee->save()){
				return back()->with('message','Fee Updated');
			}else{

				return back()->with('hasError','Error Occurred');
			}
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
