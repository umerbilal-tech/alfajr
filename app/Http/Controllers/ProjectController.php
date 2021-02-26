<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    	if($request->has('project_id')){
			$request->validate([
				"project_title"=>"required",
				"project_description"=>"required",
			]);

			$project=Project::find($request->project_id);
			$project->title=$request->project_title;
			$project->description=$request->project_description;

			if($request->hasFile('project_image')){
				Storage::disk('uploads')->delete('images/'.$project->image);
				$extension = "." . $request->project_image->getClientOriginalExtension();
				$name = basename($request->project_image->getClientOriginalName(), $extension) . time();
				$name = $name . $extension;
				Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->project_image));

				$project->image = $name;
			}

			if($project->save()){
				return back()->with('message','Project Updated');
			}else{
				return back()->with('hasError','Error');
			}
		}else{
			$request->validate([
				"project_title"=>"required",
				"project_description"=>"required",
				"project_image"=>"required|mimes:jpeg,bmp,png|max:2048",
			]);

			$project=new Project();
			$project->title=$request->project_title;
			$project->description=$request->project_description;

			$extension = "." . $request->project_image->getClientOriginalExtension();
			$name = basename($request->project_image->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->project_image));

			$project->image = $name;
			if($project->save()){
				return back()->with('message','Project Added');
			}else{
				return back()->with('hasError','Error');
			}
		}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::disk('uploads')->delete('images/'.$project->image);
        if($project->delete()){
        	return back()->with('message','Project Deleted');
		}else{
        	return back()->with('hasError','Error');
		}
    }
}
