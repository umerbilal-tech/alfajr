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
                                    <h3 class="card-title white text-capitalize">{{$user->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="{{asset('uploads/images/'.$user->image)}}" style="height: 100px;" class="rounded-circle img-border gradient-summer width-100"
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
                                <span class="font-medium-2 text-uppercase">{{$user->name}}</span>
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
                                    <span class="d-block overflow-hidden">{{$user->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>DOB:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->dob}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Gender:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->gender}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Father Name:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->father_name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Father Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->father_cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Phone:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->phone}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Emergency Contact:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->emergency_phone}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Marital Status:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->marital_status}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Husband Name:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->husband_name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Husband Cnic:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->husband_cnic}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Department:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->department}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Accommodation:</a></span>
                                    <span class="d-block overflow-hidden">@if(@$user->non_teacher->accommodation==1){{'Yes'}}@else{{'No'}}@endif</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Transport:</a></span>
                                    <span class="d-block overflow-hidden">@if(@$user->non_teacher->accommodation==1){{'Yes'}}@else{{'No'}}@endif</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Pay:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->pay}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Address:</a></span>
                                    <span class="d-block overflow-hidden">{{@$user->non_teacher->address}}</span>
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