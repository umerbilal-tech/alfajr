<?php

namespace App\Http\Controllers;

use App\BlueCollarStaff;
use App\TeacherProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TeacherProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $teachers=User::where('role',1)->with(['teacher' => function ($query) {
		   $query->where('campus_id', Session::get('campus_id'));
	   }])->orderBy('id','desc')->get();
		$non_teachers=User::where('role',2)->with(['non_teacher' => function ($query) {
			$query->where('campus_id', Session::get('campus_id'));
		}])->orderBy('id','desc')->get();

		$blue_collars=BlueCollarStaff::orderBy('id','desc')->get();

       return view('admin.staff.index',compact('teachers','non_teachers','blue_collars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
		   "father_occupation"=>"required",
		   "marital_status"=>"required",
		   "department"=>"required",
		   "subject"=>"required",
		   "phone_number"=>"required",
		   "emergency_contact"=>"required",
		   "address"=>"required",
		   "pay"=>"required",
		   "email"=>"required|email|unique:users,email",
		   "password"=>"required|confirmed",
		   "accommodation"=>"required",
		   "transport"=>"required",
		   "designation"=>"required",
		   "appointed_status"=>"required",
		   "joining_date"=>"required",
		   "application_date"=>"required",
		   "applied_for"=>"required",
		   "call_letter_date"=>"required",
		   "interview_date"=>"required",
		   "remarks"=>"required",
		   "trial_start"=>"required",
		   "trial_end"=>"required",
		   "probation_start"=>"required",
		   "probation_end"=>"required",
		   "preliminary_end"=>"required",
		   "extra_duty"=>"required",
		   "qualification"=>"required",
		   "blood_group"=>"required"
	   ]);

       DB::beginTransaction();
       try{
		   $user=new User();
		   $user->name=$request->name;
		   $user->email=$request->email;
		   $user->password=bcrypt($request->password);
		   if($request->hasFile('profile_picture')){
			   $extension = "." . $request->profile_picture->getClientOriginalExtension();
			   $name = basename($request->profile_picture->getClientOriginalName(), $extension) . time();
			   $name = $name . $extension;
			   Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->profile_picture));

			   $user->image = $name;
		   }
		   $user->role=1;
		   $user->save();


		   $profile=new TeacherProfile();
		   $profile->campus_id=Session::get('campus_id');
		   $profile->user_id=$user->id;
		   $profile->cnic=$request->cnic;
		   $profile->dob=$request->dob;
		   $profile->gender=$request->gender;
		   $profile->father_name=$request->father_name;
		   $profile->father_cnic=$request->father_cnic;
		   $profile->father_occupation=$request->father_occupation;
		   $profile->marital_status=$request->marital_status;
		   if($request->marital_status=="married"){
			   $profile->husband_name=$request->husband_name;
			   $profile->husband_cnic=$request->husband_cnic;
		   }

		   $profile->department=$request->department;
		   $profile->subject=$request->subject;
		   $profile->phone=$request->phone_number;
		   $profile->emergency_phone=$request->emergency_contact;
		   $profile->accommodation=$request->accommodation;
		   $profile->transport=$request->transport;
		   $profile->pay=$request->pay;
		   $profile->address=$request->address;

		   $profile->designation=implode(",",$request->designation);
		   $profile->appointment_status=$request->appointed_status;
		   $profile->joining_date=$request->joining_date;
		   $profile->application_date=$request->application_date;
		   $profile->applied_for=$request->applied_for;
		   $profile->call_letter_date=$request->call_letter_date;
		   $profile->interview_date=$request->interview_date;
		   $profile->remarks=$request->remarks;
		   $profile->trial_start=$request->trial_start;
		   $profile->trial_end=$request->trial_end;
		   $profile->probation_start=$request->probation_start;
		   $profile->probation_end=$request->probation_end;
		   $profile->preliminary_end=$request->preliminary_end;
		   $profile->extra_duty=$request->extra_duty;
		   $profile->qualification=json_encode($request->qualification);
		   $profile->courses=json_encode($request->other_courses);
		   $profile->experience=json_encode($request->experience);


		   $profile->permanent=$request->permanent;
		   $profile->blood_group=$request->blood_group;
		   $profile->other_facility=$request->other_facility;

		   if($request->documents!=null){
			   $doc_arr=array();
			   foreach($request->documents as $document){

				   $extension = "." . $document['file']->getClientOriginalExtension();
				   $name = basename($document['file']->getClientOriginalName(), $extension) . time();
				   $name = $name . $extension;
				   Storage::disk('uploads')->put('documents/' . $name, file_get_contents($document['file']));

				   $doc_arr[]=array('title'=>$document['title'],'file'=>$name);
			   }

			   $profile->documents=json_encode($doc_arr);
		   }


		   $profile->save();

		   DB::commit();

		   return back()->with('message','Teacher Added');
	   }catch (\Exception $e){
         	DB::rollBack();
       	    return back()->with('hasError',$e->getMessage());
	   }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findorfail($id);
        return view('admin.staff.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user=User::findorfail($id);
       return view('admin.staff.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherProfile  $teacherProfile
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
			"father_occupation"=>"required",
			"marital_status"=>"required",
			"department"=>"required",
			"subject"=>"required",
			"phone_number"=>"required",
			"emergency_contact"=>"required",
			"address"=>"required",
			"pay"=>"required",
			"email"=>"required|email|unique:users,email,".$id,
			"accommodation"=>"required",
			"transport"=>"required",
			"designation"=>"required",
			"appointed_status"=>"required",
			"joining_date"=>"required",
			"application_date"=>"required",
			"applied_for"=>"required",
			"call_letter_date"=>"required",
			"interview_date"=>"required",
			"remarks"=>"required",
			"trial_start"=>"required",
			"trial_end"=>"required",
			"probation_start"=>"required",
			"probation_end"=>"required",
			"preliminary_end"=>"required",
			"extra_duty"=>"required",
			"qualification"=>"required",
		]);

		DB::beginTransaction();
		try{
			$user= User::findorfail($id);
			$user->name=$request->name;
			$user->email=$request->email;
			if($request->password!=null){
				$request->validate(["password"=>"required|confirmed"]);
				$user->password=bcrypt($request->password);
			}

			if($request->hasFile('profile_picture')){
				$extension = "." . $request->profile_picture->getClientOriginalExtension();
				$name = basename($request->profile_picture->getClientOriginalName(), $extension) . time();
				$name = $name . $extension;
				Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->profile_picture));

				$user->image = $name;
			}
			$user->save();


			$profile=$user->teacher;
			$profile->cnic=$request->cnic;
			$profile->dob=$request->dob;
			$profile->gender=$request->gender;
			$profile->father_name=$request->father_name;
			$profile->father_cnic=$request->father_cnic;
			$profile->father_occupation=$request->father_occupation;
			$profile->marital_status=$request->marital_status;
			if($request->marital_status=="married"){
				$profile->husband_name=$request->husband_name;
				$profile->husband_cnic=$request->husband_cnic;
			}

			$profile->department=$request->department;
			$profile->subject=$request->subject;
			$profile->phone=$request->phone_number;
			$profile->emergency_phone=$request->emergency_contact;
			$profile->accommodation=$request->accommodation;
			$profile->transport=$request->transport;
			$profile->pay=$request->pay;
			$profile->address=$request->address;

			$profile->designation=implode(",",$request->designation);
			$profile->appointment_status=$request->appointed_status;
			$profile->joining_date=$request->joining_date;
			$profile->application_date=$request->application_date;
			$profile->applied_for=$request->applied_for;
			$profile->call_letter_date=$request->call_letter_date;
			$profile->interview_date=$request->interview_date;
			$profile->remarks=$request->remarks;
			$profile->trial_start=$request->trial_start;
			$profile->trial_end=$request->trial_end;
			$profile->probation_start=$request->probation_start;
			$profile->probation_end=$request->probation_end;
			$profile->preliminary_end=$request->preliminary_end;
			$profile->extra_duty=$request->extra_duty;
			$profile->qualification=json_encode($request->qualification);
			$profile->courses=json_encode($request->other_courses);
			$profile->experience=json_encode($request->experience);

			if($request->documents!=null){
				$doc_arr=array();
				foreach($request->documents as $document){

					$extension = "." . $document['file']->getClientOriginalExtension();
					$name = basename($document['file']->getClientOriginalName(), $extension) . time();
					$name = $name . $extension;
					Storage::disk('uploads')->put('documents/' . $name, file_get_contents($document['file']));

					$doc_arr[]=array('title'=>$document['title'],'file'=>$name);
				}

				$profile->documents=json_encode(array_merge(json_decode($profile->documents, true),$doc_arr));
			}


			$profile->save();

			DB::commit();

			return back()->with('message','Teacher Updated');
		}catch (\Exception $e){
			DB::rollBack();
			return back()->with('hasError',$e->getMessage());
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherProfile $teacherProfile)
    {

    }
}
