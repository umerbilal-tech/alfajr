@extends('admin.layouts.main')
@section('content')

    <!--About section starts-->
    <section id="about">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Student Details</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="text-bold-500 primary"><img src="{{asset('uploads/images/'.$student->image)}}" style="height: 200px;" class="img-fluid img-thumbnail"></span>
                               <br> <span class="text-bold-500 primary">{{$student->name}}</span>
                            </div>
                            <hr>

                                    <ul class="no-list-style row">
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a>Student's ID:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->student_id}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a>GR Number:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->gr_number}}</span>
                                        </li>

                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a>Student's Name:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> DOB:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->dob}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Gender:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->gender}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Father's Name:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->father_name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Father's Profession:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->father_profession}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Father's Qualification:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->father_qualification}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Father's CNIC:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->father_cnic}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Father's Income:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->father_income}}</span>
                                        </li>

                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Mother's Name:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->mother_name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Mother's Qualification:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->mother_qualification}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Student Blood Group:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->blood_group}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Phone Number:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->phone}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> WhatsApp Number:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->whatsapp}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Emergency Contact:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->emergency_phone}}</span>
                                        </li>


                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Guardian's Name:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->guardian_name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Guardian's Contact:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->guardian_contact}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Guardian's CNIC:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->guardian_cnic}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Guardian's Occupation:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->guardian_occupation}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Guardian's Address:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->guardian_address}}</span>
                                        </li>


                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Email:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->email}}</span>
                                        </li>

                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> City/Village:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->city}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> District:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->district}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Address:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->address}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Transport:</a></span>
                                            <span class="d-block overflow-hidden">@if($student->transport==1){{'Yes'}}@else{{'No'}}@endif</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Domicile:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->domicile}}</span>
                                        </li>


                                        <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                            <span class="text-bold-500 primary"><a>Roll Number:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->roll_number}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Class:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->class->name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Group:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->group->name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Section:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->section->name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Fee Group:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->fee_group->name}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Fee Concession:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->fee_concession}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Decided Fee:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->decided_fee}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Last School:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->last_school}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Last Class:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->last_class}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Religion:</a></span>
                                            <span class="d-block overflow-hidden">{{@$student->religion}}</span>
                                        </li>

                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Family Code:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->family_code}}</span>
                                        </li>
                                        <li class="mb-2 col-12 col-md-6 col-lg-4">
                                            <span class="text-bold-500 primary"><a> Last Fee Dep:</a></span>
                                            <span class="d-block overflow-hidden">{{$student->last_fee}}</span>
                                        </li>
                                    </ul>
                            <hr>
                            <h4>Siblings</h4>
                                <ul class="no-list-style row">
									<?php

									$siblings=json_decode(@$student->siblings);

									?>
                                    @foreach($siblings as $sibling)
                                    <li class="mb-2 col-12 col-md-6 col-lg-3">
                                        <span class="text-bold-500 primary"><a>Name:</a></span>
                                        <span class="d-block overflow-hidden">{{$sibling->student_name}}</span>
                                    </li>
                                    <li class="mb-2 col-12 col-md-6 col-lg-3">
                                        <span class="text-bold-500 primary"><a>Student ID:</a></span>
                                        <span class="d-block overflow-hidden">{{$sibling->student_id}}</span>
                                    </li>
                                    <li class="mb-2 col-12 col-md-6 col-lg-3">
                                        <span class="text-bold-500 primary"><a>Class:</a></span>
                                        <span class="d-block overflow-hidden">{{$sibling->class}}</span>
                                    </li>
                                        <?php
                                            $campus=\App\Campus::find($sibling->campus);

                                            ?>
                                    <li class="mb-2 col-12 col-md-6 col-lg-3">
                                        <span class="text-bold-500 primary"><a>Campus:</a></span>
                                        <span class="d-block overflow-hidden">{{@$campus->name}}</span>
                                    </li>

                                    @endforeach
                                </ul>
                            <hr>
                            <h4>Test Reports</h4>
                            <ul class="no-list-style row">
								<?php

								$test_reports=json_decode(@$student->test_report);

								?>
                                @foreach($test_reports as $test_report)
                                    <li class="mb-2 col-12 col-md-6 col-lg-6">
                                        <span class="text-bold-500 primary"><a>Subject:</a></span>
                                        <span class="d-block overflow-hidden">{{$test_report->subject}}</span>
                                    </li>
                                    <li class="mb-2 col-12 col-md-6 col-lg-6">
                                        <span class="text-bold-500 primary"><a>Marks:</a></span>
                                        <span class="d-block overflow-hidden">{{$test_report->number}}</span>
                                    </li>


                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About section ends-->

@endsection