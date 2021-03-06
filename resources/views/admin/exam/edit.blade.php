@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.exam.update',$exam->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section"> Edit Exam</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="class_id">Class</label>
                                            <select class="form-control" name="class_id" id="class_id" required>
                                                <option value="">--select--</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}" @if($exam->class_id==$class->id){{'selected'}}@endif>{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="group_id">Group</label>
                                            <select class="form-control" name="group_id" id="group_id" required>
                                                <option>--select--</option>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}" @if($exam->group_id==$group->id){{'selected'}}@endif>{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="section_id">Section</label>
                                            <select class="form-control" name="section_id" id="section_id" required>
                                                <option>--select--</option>
                                                @foreach($sections as $section)
                                                    <option value="{{$section->id}}" @if($exam->section_id==$section->id){{'selected'}}@endif>{{$section->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Student</label>
                                            <select class="form-control" id="student_id" name="student_id" required>
                                                <option value="">--select--</option>
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}" @if($exam->student_id==$student->id){{'selected'}}@endif>{{$student->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Exam Name</label>
                                            <input type="text" class="form-control" value="{{$exam->name}}" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" value="{{$exam->date}}" required name="date">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div id="subjects" class="row">
                                            @foreach(json_decode($exam->result) as $result)
                                                <?php
                                                $subject=\App\Subject::find($result->subject_id);

                                                ?>
                                                <div class="col-sm-4">
                                                    <input type="hidden" name="subject_id[]" value="{{$result->subject_id}}">
                                                    <div class="form-group">
                                                        <label>Subject</label>
                                                        <input type="text" readonly class="form-control" value="{{$subject->name}}">
                                                    </div>
                                                </div>
                                                    <div class="col-sm-4">
                                                         <div class="form-group">
                                                            <label>Total</label>
                                                            <input type="text" name="total[]" required class="form-control" value="{{$result->total}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group">
                                                            <label>Obtained</label>
                                                            <input type="text" name="obtained[]" required class="form-control" value="{{$result->obtained}}">
                                                        </div>
                                                    </div>
                                            @endforeach
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

        $('#class_id').on('change',function () {


            var id=$('#class_id').val();
            if (id ==""){
                alert("please select Class");
            } else {
                $('#group_id option').remove();
                $('#section_id option').remove();
                $('#student_id option').remove();
                $('#subjects').empty();

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
                $('#student_id option').remove();
                $('#subjects').empty();


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

        $('#section_id').on('change',function () {


            var id=$('#section_id').val();
            if (id ==""){
                alert("please select Section");
            } else {
                $('#student_id option').remove();
                $('#subjects').empty();


                $.ajax({
                    url: "{{url('api/sections/students/')}}/" + id,
                    type: "get",
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.students.length > 0) {
                            $('#student_id').append('<option value="">--select--</option>');
                            for (var i = 0; i < response.students.length; i++) {
                                $('#student_id').append('<option value="' + response.students[i].id + '">' + response.students[i].name + '</option>');

                            }

                        } else {
                            alert("No Record Found of students");
                        }


                        if (response.subjects.length > 0) {

                            for (var i = 0; i < response.subjects.length; i++) {
                                $('#subjects').append("<div class='col-sm-4'>" +
                                    "<input type='hidden' name='subject_id[]' value='"+response.subjects[i].id+"'>" +
                                    "<label>Subject</label><input type='text' class='form-control' readonly value='"+response.subjects[i].name+"'> " +
                                    "</div>");

                                $('#subjects').append("<div class='col-sm-4'>" +
                                    "<label>Total Marks</label><input type='text' class='form-control' name='total[]' required> " +
                                    "</div>");

                                $('#subjects').append("<div class='col-sm-4'>" +
                                    "<label>Obtained Marks</label><input type='text' class='form-control' name='obtained[]' required> " +
                                    "</div>");
                            }

                        }else {
                            alert("No Record Found of Subjects");
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