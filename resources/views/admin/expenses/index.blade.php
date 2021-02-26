@extends('admin.layouts.main')
@section('content')
    <!-- Zero configuration table -->
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Expenses <a class="btn btn-success float-right" href="{{route('admin.expense.create')}}"><i class="fa fa-plus"></i> Add New</a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table id="students_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>

                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($expenses as $expense)
                                    <tr>

                                        <td>{{$expense->date_from}}</td>
                                        <td>{{$expense->date_to}}</td>
                                        <td>
                                            <a href="{{route('admin.expense.show',$expense->id)}}"><i class="fa fa-eye text-success mr-2"></i></a>
                                            <a href="{{route('admin.expense.edit',$expense->id)}}"><i class="fa fa-pencil text-warning mr-2"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{$expenses->links()}}
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