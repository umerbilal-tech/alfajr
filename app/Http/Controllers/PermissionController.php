<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        	"user_id"=>"required"
		]);

        $permission=Permission::where('user_id',$request->user_id)->first();
        if($permission){

		}else{
        	$permission=new Permission();
        	$permission->user_id=$request->user_id;
		}

		if($request->has('campus_permission')){
			$permission->campus=1;
		}else{
			$permission->campus=0;
		}

		if($request->has('admission_permission')){
			$permission->admission=1;
		}else{
			$permission->admission=0;
		}

		if($request->has('staff_permission')){
			$permission->staff=1;
		}else{
			$permission->staff=0;
		}

		if($request->has('class_permission')){
			$permission->classes=1;
		}else{
			$permission->classes=0;
		}

		if($request->has('fee_permission')){
			$permission->fee=1;
		}else{
			$permission->fee=0;
		}

	    if($permission->save()){
	    	return back()->with('message','Permissions Updated');
		}else{
            return back()->with('hasError','Error Occurred');
		}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findorfail($id);
        $permission=Permission::where('user_id',$id)->first();
        return view('admin.permissions.index',compact('user','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
