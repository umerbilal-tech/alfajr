@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.student.filter')}}" method="GET" >

                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="student_id">Filter</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="">--select--</option>
                                        <option @if(@$type=="student_id"){{'selected'}}@endif value="student_id">Student ID</option>
                                        <option @if(@$type=="name"){{'selected'}}@endif value="name">Name</option>
                                        <option @if(@$type=="father_name"){{'selected'}}@endif value="father_name">Father Name</option>
                                        <option @if(@$type=="family_code"){{'selected'}}@endif value="family_code">Family Code</option>
                                       </select>
                                </div>
                            </div>
                              <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="search">Search</label>
                                  <input type="search" class="form-control" value="{{@$search}}" name="search" id="search" required>
                              </div>
                              </div>
                              <div class="col-sm-12 text-center">
                                  <button class="btn btn-success" type="submit">Submit</button>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section id="configuration">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Students
                            <a class="btn btn-success float-right" href="{{url('admin/student/create')}}"><i class="fa fa-plus"></i> Add New</a>
                            <a class="btn btn-warning float-right mr-1" href="{{route('admin.student.struck_off')}}"><i class="fa fa-trash"></i> Struck Off</a>
                            <a class="btn btn-danger float-right mr-1" href="{{route('admin.student.left')}}"><i class="fa fa-minus"></i> Left</a>


                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table id="students_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>GR</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->gr_number}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>
                                        <form action="{{route('admin.student.update_status')}}" class="form-inline" method="post">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                            <select class="form-control mr-2" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="active" @if($student->status=="active"){{'selected'}}@endif>Active</option>
                                                <option value="inactive" @if($student->status=="inactive"){{'selected'}}@endif>InActive</option>
                                            </select>
                                            <button type="submit" class="btn btn-success btn-sm mt-2">Save</button>
                                        </form>


                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('admin.student.left.create',$student->id)}}">Leave</a>
                                        <a class="btn btn-warning" href="{{route('admin.student.struck_off.create',$student->id)}}">Struck Off</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.student.show',$student)}}"><i class="fa fa-eye text-success mr-2"></i></a>
                                        <a href="{{route('admin.student.edit',$student)}}"><i class="fa fa-pencil text-warning mr-2"></i></a>
                                        <i class="fa fa-trash text-danger"></i>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection
@section('scripts')
    <script>
        $('#students_table').dataTable({
            "bPaginate":false
        });

        $('#class_id').on('change',function () {
            $('#group_id option').remove();
            $('#section_id option').remove();

            var id=$('#class_id').val();
            if (id ==""){
                alert("please select Class");
            } else {

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

            var id=$('#group_id').val();
            if (id ==""){
                alert("please select Group");
            } else {

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

    </script>
@endsection