@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" method="POST" action="{{route('admin.non-teaching.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"> Add New Non-Teaching Staff</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cnic">CNIC</label>
                                            <input type="text" id="cnic" class="form-control" name="cnic" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" id="dob" class="form-control" name="dob" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" checked name="gender" value="male" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline1">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2"  name="gender" value="female" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_name">Father Name</label>
                                            <input type="text" class="form-control" id="father_name" name="father_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="father_cnic">Father CNIC</label>
                                            <input type="text" class="form-control" id="father_cnic" name="father_cnic" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" required name="phone_number" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact </label>
                                            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="marital_status">Marital Status </label>
                                            <div class="input-group">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="marital_status1"  name="marital_status" value="married" class="custom-control-input">
                                                    <label class="custom-control-label" for="marital_status1">Married</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="marital_status2"  checked name="marital_status" value="unmarried" class="custom-control-input">
                                                    <label class="custom-control-label" for="marital_status2">UnMarried</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="husband_name">Husband's Name</label>
                                            <input type="text" class="form-control" disabled="disabled" id="husband_name" name="husband_name">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="husband_cnic">Husband's CNIC</label>
                                            <input type="text" class="form-control" disabled="disabled" id="husband_cnic" name="husband_cnic" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="department">Department </label>
                                            <input type="text" class="form-control" id="department" name="department" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Accommodation</label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="accommodation1" name="accommodation" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="accommodation1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="accommodation2" checked name="accommodation" value="0" class="custom-control-input">
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
                                                        <input type="radio" id="transport1" name="transport" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport1">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="transport2" checked name="transport" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="pay">Pay</label>
                                            <input type="text" class="form-control" id="pay" name="pay" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">Address </label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="profile_picture">Profile Picture </label>
                                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-actions text-right">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
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
    </script>
@endsection
