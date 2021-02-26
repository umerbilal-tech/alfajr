@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.fee_group.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"> Add Fee Group</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Group Name</label>
                                            <input type="text" id="name" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="percentage">Discount Percentage</label>
                                            <input type="number" min="0" id="percentage" class="form-control" required name="percentage">
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