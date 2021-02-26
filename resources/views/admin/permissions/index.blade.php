@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" action="{{route('admin.permission.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">Permissions</h4>
                                <p>Permissions for {{$user->name}}</p>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" @if(@$permission->campus==1){{'checked'}}@endif name="campus_permission" id="campus_permission">
                                            <label class="form-check-label" for="campus_permission">Campus Permission</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" @if(@$permission->admission==1){{'checked'}}@endif name="admission_permission" id="admission_permission">
                                            <label class="form-check-label" for="admission_permission">Admission Permission</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" @if(@$permission->staff==1){{'checked'}}@endif name="staff_permission" id="staff_permission">
                                            <label class="form-check-label" for="staff_permission">Staff Permission</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" @if(@$permission->classes==1){{'checked'}}@endif name="class_permission" id="class_permission">
                                            <label class="form-check-label" for="class_permission">Class Permission</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" @if(@$permission->fee==1){{'checked'}}@endif name="fee_permission" id="fee_permission">
                                            <label class="form-check-label" for="fee_permission">Fee Permission</label>
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