@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" method="POST" action="{{route('admin.student.update',$student)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section"> Edit Student</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="student_id">Student's ID</label>
                                            <input type="text" id="student_id" value="{{$student->student_id}}" class="form-control" required name="student_id">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gr_number">GR Number</label>
                                            <input type="text" id="gr_number" value="{{$student->gr_number}}" class="form-control" required name="gr_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Student's Name</label>
                                            <input type="text" id="name" class="form-control" value="{{$student->name}}" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" id="dob" class="form-control" name="dob" value="{{$student->dob}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" @if($student->gender=="male") checked @endif name="gender" value="male" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline1">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" @if($student->gender=="female") checked @endif name="gender" value="female" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_name">Father's Name</label>
                                            <input type="text" class="form-control" id="father_name" value="{{$student->father_name}}" name="father_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_profession">Father's Profession</label>
                                            <input type="text" class="form-control" value="{{$student->father_profession}}" id="father_profession" name="father_profession" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_qualification">Father's Qualification</label>
                                            <input type="text" class="form-control" id="father_qualification" value="{{$student->father_qualification}}" name="father_qualification" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_cnic">Father's Cnic</label>
                                            <input type="text" class="form-control" id="father_cnic" value="{{$student->father_cnic}}" name="father_cnic" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="mother_name">Mother's Name</label>
                                            <input type="text" class="form-control" id="mother_name" value="{{$student->mother_name}}" name="mother_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="mother_qualification">Mother's Qualification</label>
                                            <input type="text" class="form-control" id="mother_qualification"  value="{{$student->mother_qualification}}" name="mother_qualification" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_income">Father's Income</label>
                                            <input type="text" class="form-control" id="father_income" value="{{$student->father_income}}" name="father_income" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="blood_group">Student Blood Group</label>
                                            <select class="form-control" name="blood_group" id="blood_group" required>
                                                <option value="">--select--</option>
                                                <option @if($student->blood_group=="A+"){{'selected'}}@endif value="A+">A+</option>
                                                <option  @if($student->blood_group=="O+"){{'selected'}}@endif value="O+">O+</option>
                                                <option  @if($student->blood_group=="B+"){{'selected'}}@endif value="B+">B+</option>
                                                <option  @if($student->blood_group=="AB+"){{'selected'}}@endif value="AB+">AB+</option>
                                                <option  @if($student->blood_group=="A-"){{'selected'}}@endif value="A-">A-</option>
                                                <option  @if($student->blood_group=="O-"){{'selected'}}@endif value="O-">O-</option>
                                                <option  @if($student->blood_group=="B-"){{'selected'}}@endif value="B-">B-</option>
                                                <option  @if($student->blood_group=="AB-"){{'selected'}}@endif value="AB-">AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" value="{{$student->phone}}" name="phone_number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="whatsapp_number">WhatsApp Number</label>
                                            <input type="text" class="form-control" id="whatsapp_number" value="{{$student->whatsapp}}" name="whatsapp_number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact </label>
                                            <input type="text" class="form-control" id="emergency_contact" value="{{$student->emergency_phone}}" name="emergency_contact" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="guardian_name">Guardian's Name </label>
                                            <input type="text" class="form-control" id="guardian_name" value="{{$student->guardian_name}}" name="guardian_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="guardian_contact">Guardian's Contact </label>
                                            <input type="text" class="form-control" id="guardian_contact" name="guardian_contact" value="{{$student->guardian_contact}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="guardian_cnic">Guardian's CNIC </label>
                                            <input type="text" class="form-control" id="guardian_cnic" name="guardian_cnic" value="{{$student->guardian_cnic}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="guardian_occupation">Guardian's Occupation </label>
                                            <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="{{$student->guardian_occupation}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="guardian_address">Guardian's Address </label>
                                            <input type="text" class="form-control" id="guardian_address" name="guardian_address" value="{{$student->guardian_address}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="city_village">City/Village </label>
                                            <input type="text" class="form-control" id="city_village" name="city_village" value="{{$student->city}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="district">District </label>
                                            <input type="text" class="form-control" id="district" name="district" value="{{$student->district}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">Address </label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{$student->address}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="domicile">Domicile </label>
                                            <input type="text" class="form-control" id="domicile" name="domicile" value="{{$student->domicile}}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <h3>Siblings studying</h3>
                                        <div class="repeater2" style="margin-left: 10px;">

                                            <div data-repeater-list="siblings" class="ml-2">
												<?php

												$siblings=json_decode(@$student->siblings);

												?>
                                                @if(isset($siblings) && count($siblings) >0)
                                                @foreach($siblings as $sibling)
                                                <div data-repeater-item class="mt-2 row">

                                                    <input type="text" placeholder="Student Name" class="form-control required col-2 mr-1" value="{{$sibling->student_name}}" id="student_name" name="student_name" required>
                                                    <input type="text" placeholder="Student ID" class="form-control required col-2 mr-1" value="{{$sibling->student_id}}" id="student_id" name="student_id" required>
                                                    <input type="text" placeholder="class" class="form-control required col-2 mr-1" id="class" value="{{$sibling->class}}" name="class" required>
                                                    <select class="form-control required col-2 mr-1" name="campus" id="campus">
                                                        <option value="">--campus--</option>
                                                        @foreach($campuses as $campus)
                                                            <option value="{{$campus->id}}" @if($sibling->campus==$campus->id){{'selected'}}@endif>{{$campus->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                    @endforeach
                                                    @else
                                                        <div data-repeater-item class="mt-2 row">

                                                            <input type="text" placeholder="Student Name" class="form-control required col-2 mr-1" id="student_name" name="student_name" required>
                                                            <input type="text" placeholder="Student ID" class="form-control required col-2 mr-1" id="student_id" name="student_id" required>
                                                            <input type="text" placeholder="class" class="form-control required col-2 mr-1" id="class" name="class" required>
                                                            <select class="form-control required col-2 mr-1" name="campus" id="campus">
                                                                <option value="">--campus--</option>
                                                                @foreach($campuses as $campus)
                                                                    <option value="{{$campus->id}}">{{$campus->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                        </div>
                                                    @endif
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add Sibling"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <h3>Admission Test Reports</h3>
                                        <div class="repeater2" style="margin-left: 10px;">

                                            <div data-repeater-list="test_report" class="ml-2">
												<?php

												$test_reports=json_decode(@$student->test_report);

												?>
                                               @if(isset($test_reports) && count($test_reports) >0)
                                                @foreach($test_reports as $test_report)
                                                <div data-repeater-item class="mt-2 row">

                                                    <input type="text" placeholder="Subject" class="form-control required col-2 mr-1" value="{{$test_report->subject}}" id="subject" name="subject" required>
                                                    <input type="text" placeholder="Number" class="form-control required col-2 mr-1" value="{{$test_report->number}}" id="number" name="number" required>

                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                 @endforeach
                                                    @else
                                                        <div data-repeater-item class="mt-2 row">

                                                            <input type="text" placeholder="Subject" class="form-control required col-2 mr-1" id="subject" name="subject" required>
                                                            <input type="text" placeholder="Number" class="form-control required col-2 mr-1" id="number" name="number" required>

                                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                        </div>
                                                @endif
                                            </div>
                                            <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
                                        </div>
                                    </div>



                                </div>



                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="roll_number">Roll Number</label>
                                            <input type="text" class="form-control" id="roll_number" value="{{$student->roll_number}}" name="roll_number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="class_id">Class</label>
                                            <select class="form-control" name="class_id" id="class_id" required>
                                                <option value="">--select--</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}" @if($student->class_id==$class->id){{'selected'}}@endif>{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="group_id">Group</label>
                                            <select class="form-control" name="group_id" id="group_id" required>
                                                <option>--select--</option>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}" @if($student->group_id==$group->id){{'selected'}}@endif>{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="section_id">Section</label>
                                            <select class="form-control" name="section_id" id="section_id" required>
                                                <option>--select--</option>
                                                @foreach($sections as $section)
                                                    <option value="{{$section->id}}" @if($student->section_id==$section->id){{'selected'}}@endif>{{$section->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Transport</label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="transport1" @if($student->transport==1) checked @endif name="transport" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="transport2" @if($student->transport==0) checked @endif name="transport" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="family_code">Family Code</label>
                                            <input type="text" class="form-control" id="family_code" value="{{$student->family_code}}" name="family_code" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="fee_group">Fee Group</label>
                                            <select class="form-control" name="fee_group_id" id="fee_group" required>
                                                <option value="">--select--</option>
                                                @foreach($fee_groups as $group)
                                                    <option data-fee="{{$group->percentage}}" @if($student->fee_group_id==$group->id){{'selected'}}@endif value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="fee_concession">Fee Concession</label>
                                            <input type="number" class="form-control" value="{{$student->fee_concession}}" id="fee_concession"  name="fee_concession">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="decided_fee">Decided Fee</label>
                                            <input type="text" class="form-control" id="decided_fee" value="{{$student->decided_fee}}" name="decided_fee" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_fee_dep">Last Fee Dep</label>
                                            <input type="text" class="form-control" id="last_fee_dep" value="{{$student->last_fee}}" name="last_fee_dep" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_school">Last School Studied</label>
                                            <input type="text" class="form-control" id="last_school" value="{{$student->last_school}}" name="last_school" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_class">Last Class</label>
                                            <input type="text" class="form-control" id="last_class" value="{{$student->last_class}}" name="last_class" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="religion">Religion</label>
                                            <input type="text" class="form-control" id="religion" value="{{$student->religion}}" name="religion" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" accept="image/*" class="form-control" name="image" >
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="form-actions text-right">

                                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection


@section('scripts')
    <script>
        <?php
            $fee=\App\Fee::where('section_id',$student->section_id)->first();
            if ($fee){
            	$fees=$fee->fee;
            }else{
            	$fees=0;
            }

            ?>
        var section_fee=parseInt('{{$fees}}');
        var decided_fee=0;
        var discount=parseInt('{{$student->fee_concession}}');
        $('#class_id').on('change',function () {
            $('#group_id option').remove();
            $('#section_id option').remove();
            section_fee=0;
            decided_fee=0;
            discount=0;
            $('#fee_concession').val(0);
            $('#decided_fee').val(0);
            $('#fee_group').val("");
            $('#fee_group').prop('disabled', true);

            var id=$('#class_id').val();
            if (id ==""){
                alert("please select Class");
            } else {
                $('#group_id option').remove();
                $.ajax({
                    url: "{{url('api/class/groups/')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.groups.length > 0) {
                            $('#group_id').append('<option value="">Select group</option>');
                            for (var i = 0; i < response.groups.length; i++) {
                                $('#group_id').append('<option value="' + response.groups[i].id + '">' + response.groups[i].name + '</option>');

                            }

                        } else {
                            alert("No Record Found of Groups");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }

                    }
                });
            }

        });



        $('#group_id').on('change',function () {
            $('#section_id option').remove();
            section_fee=0;
            decided_fee=0;
            discount=0;
            $('#fee_concession').val(0);
            $('#decided_fee').val(0);
            $('#fee_group').val("");
            $('#fee_group').prop('disabled', true);

            var id=$('#group_id').val();
            if (id ==""){
                alert("please select Group");
            } else {
                $('#section_id option').remove();
                $.ajax({
                    url: "{{url('api/group/sections/')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.sections.length > 0) {
                            $('#section_id').append('<option value="">Select section</option>');
                            for (var i = 0; i < response.sections.length; i++) {
                                $('#section_id').append('<option value="' + response.sections[i].id + '">' + response.sections[i].name + '</option>');

                            }

                        } else {
                            alert("No Record Found of Section");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }

                    }
                });
            }

        });
        $('#section_id').on('change',function () {
            section_fee=0;
            decided_fee=0;
            discount=0;
            $('#fee_concession').val(0);
            $('#decided_fee').val(0);
            $('#fee_group').val("");
            $('#fee_group').prop('disabled', true);

            var id=$('#section_id').val();
            if (id ==""){
                alert("please select Section");
            } else {

                $.ajax({
                    url: "{{url('api/get/fee')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.fee){

                            section_fee=response.fee.fee;
                            $('#fee_group').prop('disabled', false);
                            $('#decided_fee').val(section_fee);
                        }else{
                            $('#fee_group').prop('disabled', true);
                            alert('No Fee exist for this section');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }

                    }
                });
            }
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

        $('#fee_group').on('change',function () {
            var id=$(this).val();
            if (id!=""){
                var data=$(this).find(':selected').data('fee');
                var concession=$('#fee_concession').val();
                discount=section_fee*data/100;
                decided_fee=section_fee-discount-concession;

                $('#decided_fee').val(decided_fee);
            }else{
                discount=0;
                var concession=$('#fee_concession').val();
                decided_fee=section_fee-concession-discount;
                $('#decided_fee').val(decided_fee);
            }

        });

        $('#fee_concession').on('change',function () {
            var concession=$(this).val();

            $('#decided_fee').val(section_fee-discount-concession);
        });

    </script>
@endsection