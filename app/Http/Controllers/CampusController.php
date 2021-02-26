<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$campuses=Campus::orderBy('id','desc')->get();
       return view('admin.campus.index',compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.create');
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
        	"campus_name"=>"required",
			"contact_number"=>"required",
			"email"=>"required",
			"country"=>"required",
			"city"=>"required",
			"province"=>"required",
			"address"=>"required",
			"location"=>"required",
			"website"=>"required",
			"start_date"=>"required",
			"description"=>"required",
			"logo"=>"required|mimes:jpeg,bmp,png|max:2048",
			"cover_image"=>"required|mimes:jpeg,bmp,png|max:2048",
		]);

        $campus=new Campus();
        $campus->name=$request->campus_name;
        $campus->number=$request->contact_number;
        $campus->email=$request->email;
        $campus->country=$request->country;
        $campus->city=$request->city;
        $campus->province=$request->province;
        $campus->address=$request->address;
        $campus->location=$request->location;
        $campus->website=$request->website;
        $campus->start_date=$request->start_date;
        $campus->description=$request->description;
        if($request->hasFile('logo')){

			$extension = "." . $request->logo->getClientOriginalExtension();
			$name = basename($request->logo->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->logo));

			$campus->logo = $name;
		}
		if($request->hasFile('cover_image')){

			$extension = "." . $request->cover_image->getClientOriginalExtension();
			$name = basename($request->cover_image->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->cover_image));

			$campus->cover = $name;
		}

		if($campus->save()){
			return back()->with('message','Campus Added Successfully');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
       return view('admin.campus.show',compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('admin.campus.edit',compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
		$request->validate([
			"campus_name"=>"required",
			"contact_number"=>"required",
			"email"=>"required",
			"country"=>"required",
			"city"=>"required",
			"province"=>"required",
			"address"=>"required",
			"location"=>"required",
			"website"=>"required",
			"start_date"=>"required",
			"description"=>"required",

		]);

		$campus->name=$request->campus_name;
		$campus->number=$request->contact_number;
		$campus->email=$request->email;
		$campus->country=$request->country;
		$campus->city=$request->city;
		$campus->province=$request->province;
		$campus->address=$request->address;
		$campus->location=$request->location;
		$campus->website=$request->website;
		$campus->start_date=$request->start_date;
		$campus->description=$request->description;
		if($request->hasFile('logo')){
          $request->validate(["logo"=>"required|mimes:jpeg,bmp,png|max:2048"]);

          Storage::disk('uploads')->delete('images/'.$campus->logo);
			$extension = "." . $request->logo->getClientOriginalExtension();
			$name = basename($request->logo->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->logo));

			$campus->logo = $name;
		}
		if($request->hasFile('cover_image')){
			$request->validate(["cover_image"=>"required|mimes:jpeg,bmp,png|max:2048"]);

			Storage::disk('uploads')->delete('images/'.$campus->cover);

			$extension = "." . $request->cover_image->getClientOriginalExtension();
			$name = basename($request->cover_image->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->cover_image));

			$campus->cover = $name;
		}

		if($campus->save()){
			return back()->with('message','Campus Updated Successfully');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        //
    }
}
