@extends('admin.layouts.main')
@section('styles')
    <style>
        .error{
            color:var(--danger);
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="content-header">Edit Teacher</div>
        </div>
    </div>
    <section id="icon-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="icons-tab-steps2 wizard-circle" action="{{route('admin.staff.update',$user->id)}}" enctype="multipart/form-data" method="post" #f="ngForm">
                            @csrf
                                @method('PUT')
                            <!-- Step 1 -->
                                <h6>Basic Information</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control required" id="name" name="name" value="{{@$user->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="cnic">CNIC</label>
                                                <input type="text" class="form-control required" id="cnic" name="cnic" value="{{@$user->teacher->cnic}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="dob">DOB</label>
                                                <input type="date" class="form-control required" id="dob" name="dob" value="{{@$user->teacher->dob}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" @if(@$user->teacher->gender=="male"){{'checked'}}@endif name="gender" value="male" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" @if(@$user->teacher->gender=="female"){{'checked'}}@endif  name="gender" value="female" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" class="form-control required" id="father_name" name="father_name" value="{{@$user->teacher->father_name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="father_cnic">Father CNIC</label>
                                                <input type="text" class="form-control required" id="father_cnic" name="father_cnic" value="{{@$user->teacher->father_cnic}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="father_occupation">Father Occupation</label>
                                                <input type="text" class="form-control required" id="father_occupation" value="{{@$user->teacher->father_occupation}}" name="father_occupation" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="marital_status">Marital Status </label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="marital_status1" @if(@$user->teacher->marital_status=="married"){{'checked'}}@endif  name="marital_status" value="married" class="custom-control-input">
                                                        <label class="custom-control-label" for="marital_status1">Married</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="marital_status2"  @if(@$user->teacher->marital_status=="unmarried"){{'checked'}}@endif name="marital_status" value="unmarried" class="custom-control-input">
                                                        <label class="custom-control-label" for="marital_status2">UnMarried</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="husband_name">Husband's Name</label>
                                                <input type="text" @if(@$user->teacher->marital_status=="unmarried") disabled="disabled" @endif class="form-control" id="husband_name" value="{{@$user->teacher->husband_name}}" name="husband_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="husband_cnic">Husband's CNIC</label>
                                                <input type="text" @if(@$user->teacher->marital_status=="unmarried") disabled="disabled" @endif class="form-control" id="husband_cnic" value="{{@$user->teacher->husband_cnic}}" name="husband_cnic" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="department">Department </label>
                                                <input type="text" class="form-control required" id="department" value="{{@$user->teacher->department}}" name="department" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control required" id="subject" value="{{{@$user->teacher->subject}}}" name="subject">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="text" class="form-control required" id="phone_number" value="{{@$user->teacher->phone}}" name="phone_number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_contact">Emergency Contact </label>
                                                <input type="text" class="form-control required" id="emergency_contact" value="{{@$user->teacher->emergency_phone}}" name="emergency_contact" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control required" id="email" name="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pay">Pay</label>
                                                <input type="text" class="form-control required" value="{{@$user->teacher->pay}}" id="pay" name="pay" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address">Address </label>
                                                <input type="text" class="form-control required" id="address" value="{{@$user->teacher->address}}" name="address" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="profile_picture">Profile Picture </label>
                                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Accommodation</label>
                                                    <div class="input-group">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="accommodation1" @if(@$user->teacher->accommodation==1){{'checked'}}@endif name="accommodation" value="1" class="custom-control-input">
                                                            <label class="custom-control-label" for="accommodation1">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="accommodation2" @if(@$user->teacher->accommodation==0){{'checked'}}@endif name="accommodation" value="0" class="custom-control-input">
                                                            <label class="custom-control-label" for="accommodation2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Transport</label>
                                                    <div class="input-group">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="transport1" name="transport" @if(@$user->teacher->transport==1){{'checked'}}@endif value="1" class="custom-control-input">
                                                            <label class="custom-control-label" for="transport1">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="transport2" name="transport" @if(@$user->teacher->transport==0){{'checked'}}@endif value="0" class="custom-control-input">
                                                            <label class="custom-control-label" for="transport2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <h6>Teacher Designation</h6>
                                    <div class="row">
                                        <?php
                                        $designations=explode(',',@$user->teacher->designation);

                                        ?>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="principal" @if(in_array('principal',$designations)){{'checked'}}@endif name="designation[]" value="principal">
                                                <label class="form-check-label" for="principal">Principal</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="vice_principal" @if(in_array('vice principal',$designations)){{'checked'}}@endif name="designation[]" value="vice principal">
                                                <label class="form-check-label" for="vice_principal">Vice Principal</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="deputy_section_head" name="designation[]"  @if(in_array('deputy section head',$designations)){{'checked'}}@endif value="deputy section head">
                                                <label class="form-check-label" for="deputy_section_head">Deputy Section Head</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="section_head" name="designation[]"  @if(in_array('section head',$designations)){{'checked'}}@endif value="section head">
                                                <label class="form-check-label" for="section_head">Section Head</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="teacher" name="designation[]"  @if(in_array('teacher',$designations)){{'checked'}}@endif value="teacher">
                                                <label class="form-check-label" for="teacher">Teacher</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="coordinator" name="designation[]"  @if(in_array('coordinator',$designations)){{'checked'}}@endif value="coordinator">
                                                <label class="form-check-label" for="coordinator">Coordinator</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="class_incharge" name="designation[]"  @if(in_array('class incharge',$designations)){{'checked'}}@endif value="class incharge">
                                                <label class="form-check-label" for="class_incharge">Class Incharge</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="focal_person" name="designation[]"  @if(in_array('focal person',$designations)){{'checked'}}@endif value="focal person">
                                                <label class="form-check-label" for="focal_person">Focal Person</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="exam_controller" name="designation[]"  @if(in_array('exam controller',$designations)){{'checked'}}@endif value="exam controller">
                                                <label class="form-check-label" for="exam_controller">Exam Controller</label>
                                            </div>
                                        </div>

                                    </div>




                                </fieldset>
                                <!-- Step 2 -->
                                <h6>Appointment</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="appointed_status">Appointed Status</label>
                                                <select class="form-control required" required id="appointed_status" name="appointed_status">
                                                    <option value="">--select--</option>
                                                    <option value="pending" @if(@$user->teacher->appointment_status=="pending"){{'selected'}}@endif>Pending</option>
                                                    <option value="approved" @if(@$user->teacher->appointment_status=="approved"){{'selected'}}@endif>Approved</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date </label>
                                                <input type="date" class="form-control required" id="joining_date" value="{{@$user->teacher->joining_date}}" name="joining_date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="application_date">Application Date</label>
                                                <input type="date" class="form-control required" id="application_date" value="{{@$user->teacher->application_date}}" name="application_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="applied_for">Applied For</label>
                                                <input type="text" class="form-control required" id="applied_for" value="{{@$user->teacher->applied_for}}" name="applied_for" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="call_letter_date">Call Letter Date </label>
                                                <input type="date" class="form-control required" id="call_letter_date" value="{{@$user->teacher->call_letter_date}}" name="call_letter_date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="interview_date">Interview Date</label>
                                                <input type="date" class="form-control required" id="interview_date" value="{{@$user->teacher->interview_date}}" name="interview_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <input type="text" class="form-control required" id="remarks" name="remarks" value="{{@$user->teacher->remarks}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="trial_start">Trial Start </label>
                                                <input type="date" class="form-control required" id="trial_start" name="trial_start" value="{{@$user->teacher->trial_start}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="trial_end">Trial End</label>
                                                <input type="date" class="form-control required" id="trial_end" name="trial_end" value="{{@$user->teacher->trial_end}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="probation_start">Probation Start </label>
                                                <input type="date" class="form-control required" id="probation_start" name="probation_start" value="{{@$user->teacher->probation_start}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="probation_end">Probation End</label>
                                                <input type="date" class="form-control required" id="probation_end" name="probation_end" value="{{@$user->teacher->probation_end}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="preliminary_end">preliminary End</label>
                                                <input type="date" class="form-control required" id="preliminary_end" name="preliminary_end" value="{{@$user->teacher->preliminary_end}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="extra_duty">Extra Duty</label>
                                                <input type="text" class="form-control required" id="extra_duty" name="extra_duty" value="{{@$user->teacher->extra_duty}}">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <!-- Step 3 -->
                                <h6>Qualification</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="repeater">
                                            <!--
                                                The value given to the data-repeater-list attribute will be used as the
                                                base of rewritten name attributes.  In this example, the first
                                                data-repeater-item's name attribute would become group-a[0][text-input],
                                                and the second data-repeater-item would become group-a[1][text-input]
                                            -->
                                            <div data-repeater-list="qualification" class="ml-2">
                                               <?php

                                                $qualifications=json_decode(@$user->teacher->qualification);

                                                ?>
                                                @foreach($qualifications as $qualification)
                                                <div data-repeater-item class="mt-2 row">

                                                    <input type="text" placeholder="Title of Degree" class="form-control required col-2 mr-1" value="{{$qualification->degree_title}}" id="degree_title" name="degree_title" required>
                                                    <input type="text" placeholder="Institute Name" class="form-control required col-2 mr-1" id="institute" value="{{$qualification->institute}}" name="institute" required>
                                                    <input type="text" placeholder="Total Marks/CGPA" class="form-control required col-2 mr-1" id="total_marks" value="{{$qualification->marks}}" name="marks" required>
                                                    <input type="text" placeholder="Obtained Marks/CGPA" class="form-control required col-2 mr-1" id="obtained_marks" value="{{$qualification->obtained_marks}}" name="obtained_marks" required>
                                                    <input type="text" placeholder="Passing Year" class="form-control col-2 required mr-1" id="passing_year" name="passing_year" value="{{$qualification->passing_year}}" required>


                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                    @endforeach
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Step 4 -->
                                <h6>Other Courses</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="repeater2">
                                            <!--
                                                The value given to the data-repeater-list attribute will be used as the
                                                base of rewritten name attributes.  In this example, the first
                                                data-repeater-item's name attribute would become group-a[0][text-input],
                                                and the second data-repeater-item would become group-a[1][text-input]
                                            -->
                                            <div data-repeater-list="other_courses" class="ml-2">
                                               <?php
                                                $courses=json_decode(@$user->teacher->courses)
                                                ?>
                                                @foreach($courses as $course)
                                                <div data-repeater-item class="mt-2 row">

                                                    <input type="text" placeholder="Course Title" class="form-control required col-2 mr-1" id="course_title" value="{{$course->course_title}}" name="course_title" required>
                                                    <input type="text" placeholder="Institute Name" class="form-control required col-2 mr-1" id="institute" value="{{$course->institute}}" name="institute" required>
                                                    <input type="date" placeholder="Start Date" class="form-control required col-2 mr-1" id="start_date" value="{{$course->start_date}}" name="start_date" required>
                                                    <input type="date" placeholder="End Date" class="form-control required col-2 mr-1" id="end_date" value="{{$course->end_date}}" name="end_date" required>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                 @endforeach
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Step 4 -->
                                <h6>Experience</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="repeater2">
                                            <!--
                                                The value given to the data-repeater-list attribute will be used as the
                                                base of rewritten name attributes.  In this example, the first
                                                data-repeater-item's name attribute would become group-a[0][text-input],
                                                and the second data-repeater-item would become group-a[1][text-input]
                                            -->
                                            <div data-repeater-list="experience" class="ml-2">
                                              <?php

                                                    $experiences=json_decode(@$user->teacher->experience);

                                                ?>
                                                @foreach($experiences as $experience)
                                                <div data-repeater-item class="mt-2 row">

                                                    <input type="text" placeholder="Job Title" class="form-control required col-2 mr-1" id="job_title" value="{{$experience->job_title}}" name="job_title" required>
                                                    <input type="text" placeholder="Organization Name" class="form-control required col-2 mr-1" id="organization" value="{{$experience->organization}}" name="organization" required>
                                                    <input type="date" placeholder="Start Date" class="form-control required col-2 mr-1" id="start_date" value="{{$experience->start_date}}" name="start_date" required>
                                                    <input type="date" placeholder="End Date" class="form-control required col-2 mr-1" id="end_date" value="{{$experience->end_date}}" name="end_date" required>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                @endforeach
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Step 4 -->
                                <h6>Documents</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="repeater3">
                                            <!--
                                                The value given to the data-repeater-list attribute will be used as the
                                                base of rewritten name attributes.  In this example, the first
                                                data-repeater-item's name attribute would become group-a[0][text-input],
                                                and the second data-repeater-item would become group-a[1][text-input]
                                            -->
                                            <div data-repeater-list="documents" class="ml-2">
                                                <div data-repeater-item class="mt-2 row">
                                                    <input type="file" class="form-control required col-5 mr-2" name="file">
                                                    <input type="text" name="title" placeholder="Title" class="form-control required  col-5 mr-2">
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wizard Ends -->

@endsection
@section('scripts')
    <script>


        $(document).ready(function () {
            $('input[type=radio][name=marital_status]').change(function() {
                if (this.value == 'married') {
                    $('#husband_name').addClass('required');
                    $('#husband_name').prop('disabled',false);
                    $('#husband_cnic').addClass('required');
                    $('#husband_cnic').prop('disabled',false);
                }
                else {
                    $('#husband_name').removeClass('required');
                    $('#husband_name').prop('disabled',true);
                    $('#husband_cnic').removeClass('required');
                    $('#husband_cnic').prop('disabled',true);
                }
            });
            $('.repeater').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: false,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {
                    'text-input': 'foo'
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.

                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: true
            });
            $('.repeater2').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: false,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {
                    'text-input': 'foo'
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.

                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: false
            });
            $('.repeater3').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: true,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {
                    'text-input': 'foo'
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.

                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: false
            });

        });

    </script>
@endsection