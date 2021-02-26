@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.student.left.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">Leaving School</h4>
                                <div class="row">
                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="leaving_date">Leaving Date</label>
                                            <input type="date" id="leaving_date" class="form-control" required name="leaving_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dues_paid">Dues Paid Upto</label>
                                            <input type="date" id="dues_paid" class="form-control" required name="dues_paid">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="conduct">Conduct</label>
                                            <input type="text" id="conduct" class="form-control" required name="conduct">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" id="remarks" class="form-control" required name="remarks">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="certificate_no">Certificate No</label>
                                            <input type="text" id="certificate_no" class="form-control" required name="certificate_no">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="issue_date">Issue Date</label>
                                            <input type="date" id="issue_date" class="form-control" required name="issue_date">
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