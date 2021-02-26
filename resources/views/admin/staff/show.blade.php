@extends('admin.layouts.main')
@section('content')
    <!--Basic User Details Starts-->
    <section id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-with-cover">
                    <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{asset('app-assets/img/photos/14.jpg')}}') 50%;"></div>
                    <div class="media profil-cover-details row">
                        <div class="col-5">
                            <div class="align-self-start halfway-fab pl-3 pt-2">
                                <div class="text-left">
                                    <h3 class="card-title white">{{$user->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="{{asset('uploads/images/'.$user->image)}}" style="height: 100px" class="rounded-circle img-border gradient-summer width-100"
                                         alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="col-5">
                        </div>

                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 ">
                                <ul class="profile-menu no-list-style">
                                    <li>
                                        <a href="#basic_info" class="primary font-medium-2 font-weight-600">Basic Info</a>
                                    </li>
                                    <li>
                                        <a href="#appointment" class="primary font-medium-2 font-weight-600">Appointment</a>
                                    </li>
                                    <li>
                                        <a href="#qualification" class="primary font-medium-2 font-weight-600">Qualification</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="font-medium-2 text-uppercase">{{$user->name}}</span>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <ul class="profile-menu no-list-style">
                                    <li>
                                        <a href="#courses" class="primary font-medium-2 font-weight-600">Other Courses</a>
                                    </li>
                                    <li>
                                        <a href="#experience" class="primary font-medium-2 font-weight-600">Experience</a>
                                    </li>
                                    <li>
                                        <a href="#documents" class="primary font-medium-2 font-weight-600">Documents</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Basic User Details Ends-->

    <!--About section starts-->
    <section id="basic_info">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Information</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Name:</a></span>
                                            <span class="d-block overflow-hidden">{{$user->name}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Gender:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->gender}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Father Occupation:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->father_occupation}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Husband's CNIC:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->husband_cnic}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Phone Number:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->phone}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Pay:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->pay}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Transport:</a></span>
                                            <span class="d-block overflow-hidden">@if(@$user->teacher->transport==1){{'Yes'}}@else{{'No'}}@endif</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> CNIC:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->cnic}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Father Name:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->father_name}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Martial Status:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->marital_status}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Department:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->department}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Emergency Contact:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->emergency_phone}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Address:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->address}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <?php
                                          //  $designations=explode(',',@$user->teacher->designation);
                                            ?>
                                            <span class="text-bold-500 primary"><a> Teacher Designation:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->designation}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> DOB:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->dob}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Father CNIC:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->father_cnic}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Husband Name:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->husband_name}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Subject:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->subject}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Email:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->email}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Accommodation:</a></span>
                                            <a class="d-block overflow-hidden">@if(@$user->teacher->transport==1){{'Yes'}}@else{{'No'}}@endif</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--About section ends-->
    <!--About section starts-->
    <section id="appointment">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Appointment</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Appointed Status:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->appointment_status}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Applied For:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->applied_for}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Remarks:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->remarks}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Probation Start:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->probation_start}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a>EXTRA DUTY:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->extra_duty}}</span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Joining Date:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->joining_date}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Call Letter Date:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->call_letter_date}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Trial Start:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->trial_start}}</a>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Probation End:</a></span>
                                            <a class="d-block overflow-hidden">{{@$user->teacher->probation_end}}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <ul class="no-list-style">
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Application Date:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->application_date}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Interview Date:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->interview_date}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> Trial End:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->trial_end}}</span>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-bold-500 primary"><a> PRELIMINARY END:</a></span>
                                            <span class="d-block overflow-hidden">{{@$user->teacher->preliminary_end}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <!--About section ends-->
    <!--About section starts-->
    <section id="qualification">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Qualification</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                                    <ul class="no-list-style row">
                                        @foreach(json_decode(@$user->teacher->qualification) as $item)

                                        <li class="mb-2 col-sm-6">
                                            <span class="primary text-bold-500"><a> {{$item->degree_title}}</a></span>
                                            <span class="grey line-height-0 d-block mb-2 font-small-2">{{$item->institute}}</span>
                                            <span class="line-height-2 d-block overflow-hidden">{{$item->obtained_marks}}/{{$item->marks}}</span>
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
    <!--About section starts-->
    <section id="courses">

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Other Courses</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="no-list-style row">
                                @foreach(json_decode(@$user->teacher->courses) as $item)

                                    <li class="mb-2 col-sm-6">
                                        <span class="primary text-bold-500"><a> {{$item->course_title}}</a></span>
                                        <span class="grey line-height-0 d-block mb-2 font-small-2">{{$item->institute}}</span>
                                        <span class="line-height-2 d-block overflow-hidden">{{$item->start_date}} to {{$item->end_date}}</span>
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
    <!--About section starts-->
    <section id="experience">

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Experience</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="no-list-style row">
                                @foreach(json_decode(@$user->teacher->experience) as $item)

                                    <li class="mb-2 col-sm-6">
                                        <span class="primary text-bold-500"><a>{{$item->job_title}}</a></span>
                                        <span class="grey line-height-0 d-block mb-2 font-small-2">{{$item->organization}}</span>
                                        <span class="line-height-2 d-block overflow-hidden">{{$item->start_date}} to {{$item->end_date}}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About section ends-->    <!--About section starts-->
    <section id="documents">

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Documents</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="no-list-style row">
                                @foreach(json_decode(@$user->teacher->documents) as $item)

                                    <li class="mb-2 col-sm-6">
                                        <span class="primary text-bold-500"><a> {{$item->title}}</a></span><br>
                                        <a class="btn btn-success" href="{{asset('uploads/documents/'.$item->file)}}" download>Download</a>
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