@extends('admin.layouts.main')
@section('content')
    <!--Basic User Details Starts-->
    <section id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-with-cover">
                    <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{asset('uploads/images/'.$campus->cover)}}') 50%;"></div>
                    <div class="media profil-cover-details row">
                        <div class="col-5">
                            <div class="align-self-start halfway-fab pl-3 pt-2">
                                <div class="text-left">
                                    <h3 class="card-title white text-capitalize">{{$campus->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="{{asset('uploads/images/'.$campus->logo)}}" class="rounded-circle img-border gradient-summer width-100"
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
                                <span class="font-medium-2 text-uppercase">{{$campus->name}}</span>
                                <p class="grey font-small-2">{{$campus->start_date}}</p>
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
                            <div class="mb-3">
                                <span class="text-bold-500 primary">Description:</span>
                                <span class="d-block overflow-hidden">
                                 {{$campus->description}}
                                </span>
                            </div>
                            <hr>
                            <ul class="no-list-style row">
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Name:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Contact Number:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->number}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Email:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->email}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Country:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->country}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>City:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->city}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Province:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->province}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Address:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->address}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Google Location:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->location}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Website:</a></span>
                                    <span class="d-block overflow-hidden">{{$campus->website}}</span>
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