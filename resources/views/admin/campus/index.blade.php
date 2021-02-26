@extends('admin.layouts.main')
@section('content')

    <!-- Basic example section start -->
    <section id="basic-examples">

        <div class="row match-height">
           @if(Auth::user()->can_access('campus'))
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">
                    <a href="{{url('admin/campus/create')}}">
                        <div class="card-content text-center">
                            <img class="img-fluid" src="{{asset('uploads/images/add.png')}}" style="height: 60px;margin-top: 100px" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Add New University/Colleges</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            @endif

          @foreach($campuses as $campus)
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card">

                    <div class="card-content text-center">
                        <img class="img-fluid" src="{{asset('uploads/images/'.$campus->logo)}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text text-capitalize"><a class="modal-btn" data-todo='{"data":<?= json_encode($campus) ?>}' data-toggle="modal" data-target="#exampleModal">{{$campus->name}}</a></p>
                        </div>
                        <div class="card-footer text-center">
                            @if(Auth::user()->can_access('campus'))
                            <a class="card-link success" href="{{route('admin.campus.show',$campus->id)}}">View</a>
                            <a class="card-link warning" href="{{route('admin.campus.edit',$campus->id)}}">Edit</a>
                            <a class="card-link danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
           @endforeach



        </div>
    </section>


@endsection
@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <form method="post" action="{{route('admin.set_campus')}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Password Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        @csrf
                       <input type="hidden" name="campus_id" id="campus_id">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on("click", ".modal-btn", function () {

            var data = $(this).data('todo').data;
            $('#campus_id').val(data.id);
             });
    </script>
@endsection