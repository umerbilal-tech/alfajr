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
                                    <h3 class="card-title white text-capitalize">{{$blueCollarStaff->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="{{asset('uploads/images/'.$blueCollarStaff->image)}}" style="height: 100px;" class="rounded-circle img-border gradient-summer width-100"
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

                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="font-medium-2 text-uppercase">{{$blueCollarStaff->name}}</span>
                            </div>
                            <div class="col-lg-5 col-md-5">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Basic User Details Ends-->


    <!--About section starts-->
    <section id="about">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Details</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <ul class="no-list-style row">
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Name:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>DOB:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->dob}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Gender:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->gender}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Father Name:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->father_name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Father Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->father_cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Phone:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->phone}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Emergency Contact:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->emergency_phone}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Marital Status:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->marital_status}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Husband Name:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->husband_name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Husband Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->husband_cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Department:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->department}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Accommodation:</a></span>
                                    <span class="d-block overflow-hidden">@if($blueCollarStaff->accommodation==1){{'Yes'}}@else{{'No'}}@endif</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Transport:</a></span>
                                    <span class="d-block overflow-hidden">@if($blueCollarStaff->accommodation==1){{'Yes'}}@else{{'No'}}@endif</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Pay:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->pay}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Address:</a></span>
                                    <span class="d-block overflow-hidden">{{$blueCollarStaff->address}}</span>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About section ends-->

@endsection