<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.classes.create');
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
        	"name"=>"required"
		]);
        $class=new Classes();
        $class->name=$request->name;
        $class->campus_id=Session::get('campus_id');
        if($class->save()){
        	return back()->with('message','Class Added');
		}else{
        	return back()->with('hasError','Error');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
      return view('admin.classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
        	"name"=>"required"
		]);
        $class->name=$request->name;
        if($class->save()){
        	return back()->with('message','Class Updated');
		}else{
        	return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
