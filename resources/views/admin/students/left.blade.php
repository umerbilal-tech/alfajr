@extends('admin.layouts.main')
@section('content')
    <!-- Zero configuration table -->
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Left Students
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
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Group</th>
                                    <th>Section</th>
                                    <th>Leaving Date</th>
                                    <th>Dues Paid Upto</th>
                                    <th>Conduct</th>
                                    <th>Remarks</th>
                                    <th>Certificate No</th>
                                    <th>Issue Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->name}}</td>

                                        <td>{{@$student->class->name}}</td>
                                        <td>{{@$student->group->name}}</td>
                                        <td>{{@$student->section->name}}</td>
                                        <td>{{@$student->left()->leaving_date}}</td>
                                        <td>{{@$student->left()->dues_paid}}</td>
                                        <td>{{@$student->left()->conduct}}</td>
                                        <td>{{@$student->left()->remarks}}</td>
                                        <td>{{@$student->left()->certificate_no}}</td>
                                        <td>{{@$student->left()->issue_date}}</td>
                                        <td><a class="btn btn-primary" href="{{route('admin.student.readmission.create',$student->id)}}">ReAdmission</a></td>

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
    </script>
@endsection