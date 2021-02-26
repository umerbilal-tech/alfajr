@extends('admin.layouts.main')
@section('content')
    <!-- Zero configuration table -->
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subjects <a class="btn btn-success float-right" href="{{route('admin.subject.create')}}"><i class="fa fa-plus"></i> Add New</a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table id="fee_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Group</th>
                                    <th>Section</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{@$subject->class->name}}</td>
                                    <td>{{@$subject->group->name}}</td>
                                    <td>{{@$subject->section->name}}</td>
                                    <td>{{@$subject->name}}</td>
                                    <td>{{@$subject->code}}</td>
                                    <td>
                                      <a href="{{route('admin.subject.edit',$subject->id)}}"><i class="fa fa-pencil text-warning mr-2"></i></a>
                                        <i class="fa fa-trash text-danger"></i>
                                    </td>
                                </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection
@section('scripts')
    <script>
        $('#fee_table').dataTable({

        });
    </script>
@endsection