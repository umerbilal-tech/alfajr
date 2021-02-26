<?php

namespace App\Http\Controllers;

use App\BlueCollarStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlueCollarStaffController extends Controller
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
        return view('admin.blueCollar.create');
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
			"cnic"=>"required",
			"dob"=>"required",
			"gender"=>"required",
			"father_name"=>"required",
			"father_cnic"=>"required",
			"marital_status"=>"required",
			"department"=>"required",
			"phone_number"=>"required",
			"emergency_contact"=>"required",
			"address"=>"required",
			"pay"=>"required",
			"accommodation"=>"required",
			"transport"=>"required",
		]);

		DB::beginTransaction();
		try {
			$profile = new BlueCollarStaff();
			$profile->name = $request->name;
			if ($request->hasFile('profile_picture')) {
				$extension = "." . $request->profile_picture->getClientOriginalExtension();
				$name = basename($request->profile_picture->getClientOriginalName(), $extension) . time();
				$name = $name . $extension;
				Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->profile_picture));

				$profile->image = $name;
			}

			$profile->campus_id = Session::get('campus_id');
			$profile->cnic = $request->cnic;
			$profile->dob = $request->dob;
			$profile->gender = $request->gender;
			$profile->father_name = $request->father_name;
			$profile->father_cnic = $request->father_cnic;
			$profile->marital_status = $request->marital_status;
			if ($request->marital_status == "married") {
				$profile->husband_name = $request->husband_name;
				$profile->husband_cnic = $request->husband_cnic;
			}

			$profile->department = $request->department;
			$profile->phone = $request->phone_number;
			$profile->emergency_phone = $request->emergency_contact;
			$profile->accommodation = $request->accommodation;
			$profile->transport = $request->transport;
			$profile->pay = $request->pay;
			$profile->address = $request->address;
			$profile->save();
			DB::commit();
			return back()->with('message','Added Successfully');
		}catch (\Exception $e){
			DB::rollBack();
			return back()->with('hasError',$e->getMessage());
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlueCollarStaff  $blueCollarStaff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$blueCollarStaff=BlueCollarStaff::findorfail($id);

    	return  view('admin.blueCollar.show',compact('blueCollarStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlueCollarStaff  $blueCollarStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=BlueCollarStaff::findorfail($id);
        return view('admin.blueCollar.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlueCollarStaff  $blueCollarStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$request->validate([
			"name"=>"required",
			"cnic"=>"required",
			"dob"=>"required",
			"gender"=>"required",
			"father_name"=>"required",
			"father_cnic"=>"required",
			"marital_status"=>"required",
			"department"=>"required",
			"phone_number"=>"required",
			"emergency_contact"=>"required",
			"address"=>"required",
			"pay"=>"required",
			"accommodation"=>"required",
			"transport"=>"required",
		]);

		DB::beginTransaction();
		try {
			$profile = BlueCollarStaff::findorfail($id);
			$profile->name = $request->name;
			if ($request->hasFile('profile_picture')) {
				$extension = "." . $request->profile_picture->getClientOriginalExtension();
				$name = basename($request->profile_picture->getClientOriginalName(), $extension) . time();
				$name = $name . $extension;
				Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->profile_picture));

				$profile->image = $name;
			}

			$profile->cnic = $request->cnic;
			$profile->dob = $request->dob;
			$profile->gender = $request->gender;
			$profile->father_name = $request->father_name;
			$profile->father_cnic = $request->father_cnic;
			$profile->marital_status = $request->marital_status;
			if ($request->marital_status == "married") {
				$profile->husband_name = $request->husband_name;
				$profile->husband_cnic = $request->husband_cnic;
			}

			$profile->department = $request->department;
			$profile->phone = $request->phone_number;
			$profile->emergency_phone = $request->emergency_contact;
			$profile->accommodation = $request->accommodation;
			$profile->transport = $request->transport;
			$profile->pay = $request->pay;
			$profile->address = $request->address;
			$profile->save();
			DB::commit();
			return back()->with('message','Updated Successfully');
		}catch (\Exception $e){
			DB::rollBack();
			return back()->with('hasError',$e->getMessage());
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlueCollarStaff  $blueCollarStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlueCollarStaff $blueCollarStaff)
    {
        //
    }
}
