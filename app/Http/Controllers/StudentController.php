<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Classes;
use App\Fee;
use App\FeeGroup;
use App\Group;
use App\LeavingRecord;
use App\Readmission;
use App\Section;
use App\StruckOff;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        $students=Student::where('campus_id',Session::get('campus_id'))->whereIn('state',['studying','readmission'])->orderBy('class_id','asc')->paginate(50);
        return view('admin.students.index',compact('students','classes'));
    }

    public function filter(Request $request){

        $request->validate([
        	"type"=>"required",
			"search"=>"required"
		]);
          $type=$request->type;
          $search=$request->search;
        if($request->type=="student_id"){
			$students=Student::where('campus_id',Session::get('campus_id'))->where('student_id',$request->search)->whereIn('state',['studying','readmission'])->orderBy('class_id','asc')->paginate(50);
		}elseif ($request->type=="name"){
			$students=Student::where('campus_id',Session::get('campus_id'))->where('name','like','%'.$request->search.'%')->whereIn('state',['studying','readmission'])->orderBy('class_id','asc')->paginate(50);

		}elseif ($request->type=="father_name"){
			$students=Student::where('campus_id',Session::get('campus_id'))->where('father_name','like','%'.$request->search.'%')->whereIn('state',['studying','readmission'])->orderBy('class_id','asc')->paginate(50);

		}elseif ($request->type=="family_code"){
			$students=Student::where('campus_id',Session::get('campus_id'))->where('family_code',$request->search)->whereIn('state',['studying','readmission'])->orderBy('class_id','asc')->paginate(50);

		}elseif ($request->type=="fee_group"){

		}

		return view('admin.students.index',compact('students','type','search'));

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$campuses=Campus::all();
    	$groups=FeeGroup::all();
        $classes=Classes::where('campus_id',Session::get('campus_id'))->get();
        return view('admin.students.create',compact('classes','campuses','groups'));
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
		   "father_name"=>"required",
		   "dob"=>"required",
		   "gender"=>"required",
		   "roll_number"=>"required",
		   "class_id"=>"required",
		   "group_id"=>"required",
		   "section_id"=>"required",
		   "phone_number"=>"required",
		   "whatsapp_number"=>"required",
		   "emergency_contact"=>"required",
		   "guardian_name"=>"required",
		   "guardian_contact"=>"required",
		   "guardian_cnic"=>"required",
		   "guardian_occupation"=>"required",
		   "guardian_address"=>"required",
		   "email"=>"required",
		   "city_village"=>"required",
		   "district"=>"required",
		   "address"=>"required",
		   "transport"=>"required",
		   "family_code"=>"required",
		   "last_fee_dep"=>"required",
		   "image"=>"required",

		   "student_id"=>"required",
		   "gr_number"=>"required",
		   "fee_group_id"=>"required",
		   "decided_fee"=>"required",
		   "father_profession"=>"required",
		   "father_qualification"=>"required",
		   "father_cnic"=>"required",
		   "mother_name"=>"required",
		   "mother_qualification"=>"required",
		   "father_income"=>"required",
		   "blood_group"=>"required",
		   "last_school"=>"required",
		   "last_class"=>"required",
		   "domicile"=>"required",
		   "religion"=>"required",
		   "test_report"=>"required",
	   ]);

       $student=new Student();
       $student->campus_id=Session::get('campus_id');
       $student->name=$request->name;

		if($request->hasFile('image')){
			$extension = "." . $request->image->getClientOriginalExtension();
			$name = basename($request->image->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->image));

			$student->image = $name;
		}

		$student->father_name=$request->father_name;
		$student->dob=$request->dob;
		$student->gender=$request->gender;
		$student->roll_number=$request->roll_number;
		$student->class_id=$request->class_id;
		$student->group_id=$request->group_id;
		$student->section_id=$request->section_id;
		$student->phone=$request->phone_number;
		$student->whatsapp=$request->whatsapp_number;
		$student->emergency_phone=$request->emergency_contact;
		$student->guardian_name=$request->guardian_name;
		$student->guardian_contact=$request->guardian_contact;
		$student->guardian_cnic=$request->guardian_cnic;
		$student->guardian_occupation=$request->guardian_occupation;
		$student->guardian_address=$request->guardian_address;
		$student->email=$request->email;
		$student->city=$request->city_village;
		$student->district=$request->district;
		$student->address=$request->address;
		$student->transport=$request->transport;
		$student->family_code=$request->family_code;
	    $student->last_fee=$request->last_fee_dep;

		$student->student_id=$request->student_id;
		$student->gr_number=$request->gr_number;
		$student->fee_group_id=$request->fee_group_id;
		$student->decided_fee=$request->decided_fee;
		$student->father_profession=$request->father_profession;
		$student->father_qualification=$request->father_qualification;
		$student->father_cnic=$request->father_cnic;
		$student->mother_name=$request->mother_name;
		$student->mother_qualification=$request->mother_qualification;
		$student->father_income=$request->father_income;
		$student->blood_group=$request->blood_group;
		$student->last_school=$request->last_school;
		$student->last_class=$request->last_class;
		$student->domicile=$request->domicile;
		$student->religion=$request->religion;
		$student->test_report=json_encode($request->test_report);
		$student->siblings=json_encode($request->siblings);
		$student->fee_concession=$request->fee_concession;


	    if($student->save()){
	    	return back()->with('message','Student Added');
		}else{
	    	return back()->with('hasError','Error');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
		$campuses=Campus::all();
		$classes=Classes::where('campus_id',Session::get('campus_id'))->get();
		$groups=Group::where('class_id',$student->class_id)->get();
		$sections=Section::where('group_id',$student->group_id)->get();
		$fee_groups=FeeGroup::all();
		return view('admin.students.edit',compact('student','fee_groups','classes','groups','sections','campuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
		$request->validate([
			"name"=>"required",
			"father_name"=>"required",
			"dob"=>"required",
			"gender"=>"required",
			"roll_number"=>"required",
			"class_id"=>"required",
			"group_id"=>"required",
			"section_id"=>"required",
			"phone_number"=>"required",
			"whatsapp_number"=>"required",
			"emergency_contact"=>"required",
			"guardian_name"=>"required",
			"guardian_contact"=>"required",
			"guardian_cnic"=>"required",
			"guardian_occupation"=>"required",
			"guardian_address"=>"required",
			"email"=>"required",
			"city_village"=>"required",
			"district"=>"required",
			"address"=>"required",
			"transport"=>"required",
			"family_code"=>"required",
			"last_fee_dep"=>"required",

			"student_id"=>"required",
			"gr_number"=>"required",
			"fee_group_id"=>"required",
			"decided_fee"=>"required",
			"father_profession"=>"required",
			"father_qualification"=>"required",
			"father_cnic"=>"required",
			"mother_name"=>"required",
			"mother_qualification"=>"required",
			"father_income"=>"required",
			"blood_group"=>"required",
			"last_school"=>"required",
			"last_class"=>"required",
			"domicile"=>"required",
			"religion"=>"required",
			"test_report"=>"required",
		]);


		$student->campus_id=Session::get('campus_id');
		$student->name=$request->name;

		if($request->hasFile('image')){
			Storage::disk('uploads')->delete('images/'.$student->image);
			$extension = "." . $request->image->getClientOriginalExtension();
			$name = basename($request->image->getClientOriginalName(), $extension) . time();
			$name = $name . $extension;
			Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->image));

			$student->image = $name;
		}

		$student->father_name=$request->father_name;
		$student->dob=$request->dob;
		$student->gender=$request->gender;
		$student->roll_number=$request->roll_number;
		$student->class_id=$request->class_id;
		$student->group_id=$request->group_id;
		$student->section_id=$request->section_id;
		$student->phone=$request->phone_number;
		$student->whatsapp=$request->whatsapp_number;
		$student->emergency_phone=$request->emergency_contact;
		$student->guardian_name=$request->guardian_name;
		$student->guardian_contact=$request->guardian_contact;
		$student->guardian_cnic=$request->guardian_cnic;
		$student->guardian_occupation=$request->guardian_occupation;
		$student->guardian_address=$request->guardian_address;
		$student->email=$request->email;
		$student->city=$request->city_village;
		$student->district=$request->district;
		$student->address=$request->address;
		$student->transport=$request->transport;
		$student->family_code=$request->family_code;
		$student->last_fee=$request->last_fee_dep;

		$student->student_id=$request->student_id;
		$student->gr_number=$request->gr_number;
		$student->fee_group_id=$request->fee_group_id;
		$student->decided_fee=$request->decided_fee;
		$student->father_profession=$request->father_profession;
		$student->father_qualification=$request->father_qualification;
		$student->father_cnic=$request->father_cnic;
		$student->mother_name=$request->mother_name;
		$student->mother_qualification=$request->mother_qualification;
		$student->father_income=$request->father_income;
		$student->blood_group=$request->blood_group;
		$student->last_school=$request->last_school;
		$student->last_class=$request->last_class;
		$student->domicile=$request->domicile;
		$student->religion=$request->religion;
		$student->test_report=json_encode($request->test_report);
		$student->siblings=json_encode($request->siblings);
		$student->fee_concession=$request->fee_concession;

		if($student->save()){
			return back()->with('message','Student Updated');
		}else{
			return back()->with('hasError','Error');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function update_status(Request $request){
    	$request->validate([
    		"student_id"=>"required",
			"status"=>"required"
		]);

    	$student=Student::findorfail($request->student_id);
    	$student->status=$request->status;
    	if($student->save()){
    		return back()->with('message','Status Updated');
		}else{
    		return back()->with('hasError','Error');
		}
	}

	public function struck_off(){
		$students=Student::where('campus_id',Session::get('campus_id'))->where('state','struck_off')->orderBy('class_id','asc')->paginate(50);
		return view('admin.students.struck_off',compact('students'));
	}

	public function struck_off_create($id){
    	$student=Student::findorfail($id);
    	return view('admin.students.stuck_off_create',compact('student'));
	}

	public function struck_off_store(Request $request){

    	$request->validate([
    		"student_id"=>"required",
			"date"=>"required",
			"reason"=>"required"
		]);

    	$student=Student::findorfail($request->student_id);

    	$struck=new StruckOff();
    	$struck->student_id=$student->id;
    	$struck->date=$request->date;
    	$struck->reason=$request->reason;
    	$struck->save();

    	$student->state="struck_off";
    	if($student->save()){
    		return redirect(route('admin.student.index'))->with('message','StruckOff Successfully');
		}else{
    		return back()->with('hasError','Error');
		}
	}

	public function left(){
		$students=Student::where('campus_id',Session::get('campus_id'))->where('state','left')->orderBy('class_id','asc')->paginate(50);
		return view('admin.students.left',compact('students'));

	}

	public function left_create($id){
    	$student=Student::findorfail($id);
    	return view('admin.students.left_create',compact('student'));
	}

	public function left_store(Request $request){

    	$request->validate([
    		"student_id"=>"required",
			"leaving_date"=>"required",
			"dues_paid"=>"required",
			"conduct"=>"required",
			"remarks"=>"required",
			"certificate_no"=>"required",
			"issue_date"=>"required"
		]);
		$student=Student::findorfail($request->student_id);
		$left=new LeavingRecord();
		$left->student_id=$student->id;
		$left->leaving_date=$request->leaving_date;
		$left->dues_paid=$request->dues_paid;
		$left->conduct=$request->conduct;
		$left->remarks=$request->remarks;
		$left->certificate_no=$request->certificate_no;
		$left->issue_date=$request->issue_date;
		$left->save();

		$student->state="left";
		if($student->save()){
			return redirect(route('admin.student.index'))->with('message','Leaving Record Added');
		}else{
			return back()->with('hasError','Error');
		}
	}

	public function readmission_create($id){
    	$student=Student::findorfail($id);
    	return view('admin.students.readmission',compact('student'));
	}

	public function readmission_store(Request $request){

    	$request->validate([
    		"student_id"=>"required",
    		"date"=>"required",
			"reason"=>"required",
			"remarks"=>"required"
		]);

    	$student=Student::findorfail($request->student_id);
    	$admit=new Readmission();
    	$admit->student_id=$student->id;
    	$admit->date=$request->date;
    	$admit->reason=$request->reason;
    	$admit->remarks=$request->remarks;
    	$admit->save();

		$student->state="readmission";
    	if($student->save()){
    		return redirect(route('admin.student.index'))->with('message','Readmission Successful');
		}else{
            return back()->with('hasError','Error');
		}

	}
}
