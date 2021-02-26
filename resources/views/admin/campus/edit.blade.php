@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.campus.update',$campus->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section"> Edit Campus</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="campus_name">Campus Name</label>
                                            <input type="text" id="campus_name" class="form-control" required value="{{$campus->name}}" name="campus_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" id="contact_number" class="form-control" value="{{$campus->number}}" name="contact_number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" class="form-control" name="email" value="{{$campus->email}}" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" id="country" class="form-control" required value="{{$campus->country}}" name="country">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" class="form-control" value="{{$campus->city}}" name="city" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <input type="text" id="province" class="form-control" value="{{$campus->province}}" name="province" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" class="form-control" value="{{$campus->address}}" required name="address">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="location">Google Location</label>
                                            <input type="text" id="location" class="form-control" value="{{$campus->location}}" name="location" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="form-control" value="{{$campus->website}}" name="website" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" class="form-control" value="{{$campus->start_date}}" required name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="description">Descriptions</label>
                                            <input type="text" id="description" class="form-control" value="{{$campus->description}}" name="description" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo" class="form-control" name="logo" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cover_image">Cover Image</label>
                                            <input type="file" id="cover_image" class="form-control" name="cover_image">
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