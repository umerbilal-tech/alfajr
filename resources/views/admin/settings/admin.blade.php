@extends('admin.layouts.main')
@section('content')

    <!-- Vertical Tabs start -->
    <section id="vertical-tabs">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Admin Panel</h4>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="nav-vertical">
                                <ul class="nav nav-tabs nav-left flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tabVerticalLeft1"
                                           href="#tabVerticalLeft1" aria-expanded="true">Profile Image</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2"
                                           href="#tabVerticalLeft2" aria-expanded="false">Email</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalLeft-tab3" data-toggle="tab" aria-controls="tabVerticalLeft3"
                                           href="#tabVerticalLeft3" aria-expanded="false">Password </a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1">
                                    <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft1" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab1">

                                            <form action="{{route('admin.update.image')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="image">Profile Image</label>
                                                    <input type="file" id="image" class="dropify form-control" name="image" required>
                                                </div>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>




                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft2" aria-labelledby="baseVerticalLeft-tab2">
                                        <form action="{{route('admin.update.email')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="current_email">Current Email</label>
                                                <input type="email" class="form-control col-6" id="current_email" name="current_email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_email">New Email</label>
                                                <input type="email" class="form-control col-6" id="new_email" name="new_email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_email">Confirm Email</label>
                                                <input type="email" class="form-control col-6" id="confirm_email" name="confirm_email" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft3" aria-labelledby="baseVerticalLeft-tab3">
                                        <form action="{{route('admin.update.password')}}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" class="form-control col-6" id="current_password" name="current_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input type="password" class="form-control col-6" id="password" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control col-6" id="password_confirmation" name="password_confirmation" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Vertical Tabs end -->

@endsection
@section('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endsection