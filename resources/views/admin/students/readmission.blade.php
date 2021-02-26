@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.student.readmission.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"> ReAdmit Student</h4>
                                <div class="row">
                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" id="date" class="form-control" required name="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" id="remarks" class="form-control" required name="remarks">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="reason">Reason</label>
                                            <textarea class="form-control" name="reason" id="reason" required rows="3"></textarea>
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