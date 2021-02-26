@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.expense.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"> Add Expense</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Date From</label>
                                            <input type="date" class="form-control" required name="date_from">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Date To</label>
                                            <input type="date" class="form-control" required name="date_to">
                                        </div>
                                    </div>
                                </div>
                                <div class="repeater" style="margin-left: 10px;">

                                    <div data-repeater-list="expenses" class="ml-2">
                                        <div data-repeater-item class="mt-2 row">
                                            <div class="col-4">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Amount</label>
                                                <input type="number" min="0" id="amount" class="form-control" value="0" name="amount" required>
                                            </div>
                                            <input data-repeater-delete type="button" style="margin-top: 30px" class="btn btn-danger" value="Delete"/>
                                        </div>
                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success mt-2" value="Add More"/>
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
        $('.repeater').repeater({

            initEmpty: false,
            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },

            isFirstItemUndeletable: true
        });
    </script>
@endsection