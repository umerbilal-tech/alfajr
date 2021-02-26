<?php

namespace App\Http\Controllers;

use App\FeeGroup;
use Illuminate\Http\Request;

class FeeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $groups=FeeGroup::all();
       return view('admin.fee_group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fee_group.create');
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
		"percentage"=>"required",
	   ]);
       $group=new FeeGroup();
       $group->name=$request->name;
       $group->percentage=$request->percentage;
       if($group->save()){
       	 return back()->with('message','Fee Group Added');
	   }else{
       	return back()->with('hasError','Error');
	   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FeeGroup $feeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeGroup $feeGroup)
    {
       return view('admin.fee_group.edit',compact('feeGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeGroup $feeGroup)
    {
		$request->validate([
			"name"=>"required",
			"percentage"=>"required",
		]);

		$feeGroup->name=$request->name;
		$feeGroup->percentage=$request->percentage;
		if($feeGroup->save()){
			return back()->with('message','Fee Group Updated');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeGroup $feeGroup)
    {
        //
    }
}
