@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.exam.index')}}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">Exams  <a class="btn btn-success float-right" href="{{route('admin.exam.create')}}">Add</a>
                                </h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Class</label>
                                            <select class="form-control" name="class_id" id="class_id" required>
                                                <option value="">--select--</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Group</label>
                                            <select class="form-control" name="group_id" id="group_id" required>
                                                <option value="">--select--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Section</label>
                                            <select class="form-control" id="section_id" name="section_id" required>
                                                <option value="">--select--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Date</label>
                                            <input type="date" class="form-control" name="date" required>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                            <i class="fa fa-check-square-o"></i> Submit
                                        </button>
                                    </div>

                                </div>


                            </div>

                        </form>

                        <hr>

                        @if(@$exams)

                            <div class="table-responsive">
                                <table id="groups_table" class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Exam</th>
                                            <th>Date</th>
                                            <th>Class</th>
                                            <th>Group</th>
                                            <th>Section</th>
                                            <th>Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($exams as $exam)
                                        <tr>
                                            <td>{{@$exam->name}}</td>
                                            <td>{{@$exam->date}}</td>

                                            <td>{{@$exam->class->name}}</td>
                                            <td>{{@$exam->group->name}}</td>
                                            <td>{{@$exam->section->name}}</td>
                                            <td>{{@$exam->student->name}}</td>
                                            <td >
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.exam.show',$exam->id)}}">Details</a>
                                                <a class="btn btn-warning btn-sm" href="{{route('admin.exam.edit',$exam->id)}}">Edit</a>
                                                <a href="javascript:;" class="btn btn-danger btn-sm" onclick="confirmDelete('{{$exam->id}}')">Delete</a>
                                                <form id="delete-exam-{{$exam->id}}" action="{{ route('admin.exam.destroy', $exam->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('DELETE') }}
                                                    {{csrf_field()}}
                                                </form>

                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @else

                            <h1 class="text-center text-primary">No Record Found</h1>

                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id) {
            let choice=confirm("Are you sure, You want to delete Exam");
            if (choice){
                document.getElementById("delete-exam-"+id).submit();
            }
        }
        $('#class_id').on('change',function () {


            var id=$('#class_id').val();
            if (id ==""){
                alert("please select Class");
            } else {
                $('#group_id option').remove();
                $('#section_id option').remove();
                $('#students option').remove();

                $.ajax({
                    url: "{{url('api/class/groups/')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.groups.length > 0) {
                            $('#group_id').append('<option value="">--select--</option>');
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


            var id=$('#group_id').val();
            if (id ==""){
                alert("please select Group");
            } else {
                $('#section_id option').remove();
                $('#students option').remove();

                $.ajax({
                    url: "{{url('api/group/sections/')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.sections.length > 0) {
                            $('#section_id').append('<option value="">--select--</option>');
                            for (var i = 0; i < response.sections.length; i++) {
                                $('#section_id').append('<option value="' + response.sections[i].id + '">' + response.sections[i].name + '</option>');

                            }

                        } else {
                            alert("No Record Found of sections");
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