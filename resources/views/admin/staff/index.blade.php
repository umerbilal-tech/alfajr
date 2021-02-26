@extends('admin.layouts.main')
@section('content')

    <!-- Basic example section start -->
    <section id="basic-examples">
        <h3>Teaching Staff</h3>
        <div class="row match-height">

            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <a href="{{url('admin/staff/create')}}">
                        <div class="card-content text-center">
                            <img class="img-fluid" src="{{asset('uploads/images/add.png')}}" style="height: 60px;margin-top: 100px" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Add New </p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            @foreach($teachers as $teacher)
                <div class="col-xl-3 col-lg-6 col-md-12">
                    <div class="card">

                        <div class="card-content text-center">
                            <img class="img-fluid" style="height: 170px" src="{{asset('uploads/images/'.$teacher->image)}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$teacher->name}}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a class="card-link primary" href="{{route('admin.permission.edit',$teacher->id)}}">Set Permissions</a><br>

                                <a class="card-link success" href="{{route('admin.staff.show',$teacher->id)}}">View</a>
                                <a class="card-link warning" href="{{route('admin.staff.edit',$teacher->id)}}">Edit</a>
                                <a class="card-link danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    </section>
    <!-- // Basic example section end -->

    <!-- Basic example section start -->
    <section id="basic-examples">
        <h3>Non-Teaching Staff</h3>
        <div class="row match-height">
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <a href="{{route('admin.non-teaching.create')}}">
                        <div class="card-content text-center">
                            <img class="img-fluid" src="{{asset('uploads/images/add.png')}}" style="height: 60px;margin-top: 100px" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Add New</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
          @foreach($non_teachers as $non_teacher)
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">

                    <div class="card-content text-center">
                        <img class="img-fluid" style="height: 170px" src="{{asset('uploads/images/'.$non_teacher->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{$non_teacher->name}}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a class="card-link primary" href="{{route('admin.permission.edit',$non_teacher->id)}}">Set Permissions</a><br>
                            <a class="card-link success" href="{{route('admin.non-teaching.show',$non_teacher->id)}}">View</a>
                            <a class="card-link warning" href="{{route('admin.non-teaching.edit',$non_teacher->id)}}">Edit</a>
                            <a class="card-link danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </section>
    <!-- // Basic example section end -->

    <!-- Basic example section start -->
    <section id="basic-examples">
        <h3>Other Staff</h3>
        <div class="row match-height">

            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <a href="{{route('admin.blueCollar.create')}}">
                        <div class="card-content text-center">
                            <img class="img-fluid" src="{{asset('uploads/images/add.png')}}" style="height: 60px;margin-top: 100px" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Add New</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
           @foreach($blue_collars as $blue_collar)
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">

                    <div class="card-content text-center">
                        <img class="img-fluid" style="height: 170px" src="{{asset('uploads/images/'.$blue_collar->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{$blue_collar->name}}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a class="card-link primary" href="{{route('admin.permission.edit',$blue_collar->id)}}">Set Permissions</a><br>

                            <a class="card-link success" href="{{route('admin.blueCollar.show',$blue_collar->id)}}">View</a>
                            <a class="card-link warning" href="{{route('admin.blueCollar.edit',$blue_collar->id)}}">Edit</a>
                            <a class="card-link danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </section>
    <!-- // Basic example section end -->
 @endsection