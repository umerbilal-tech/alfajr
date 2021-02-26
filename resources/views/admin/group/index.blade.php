@extends('admin.layouts.main')
@section('content')
    <!-- Zero configuration table -->
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Groups <a class="btn btn-success float-right" href="{{route('admin.group.create')}}"><i class="fa fa-plus"></i> Add New</a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table id="groups_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sr.No#</th>

                                    <th>Class</th>
                                    <th>Group</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$count=1;
								?>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{$count++}}</td>

                                        <td>{{$group->class->name}}</td>
                                        <td>{{$group->name}}</td>
                                        <td>
                                            <a href="{{route('admin.group.edit',$group->id)}}"><i class="fa fa-pencil text-warning mr-2"></i></a>
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
        $('#groups_table').dataTable({
            "bPaginate":false
        });
    </script>
@endsection