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
                                           href="#tabVerticalLeft1" aria-expanded="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2"
                                           href="#tabVerticalLeft2" aria-expanded="false">Projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalLeft-tab3" data-toggle="tab" aria-controls="tabVerticalLeft3"
                                           href="#tabVerticalLeft3" aria-expanded="false">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalLeft-tab4" data-toggle="tab" aria-controls="tabVerticalLeft4"
                                           href="#tabVerticalLeft4" aria-expanded="false">Contact Us </a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1">
                                    <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft1" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab1">



                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft2" aria-labelledby="baseVerticalLeft-tab2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                           Add Project
                                        </button>

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($projects as $project)
                                                <tr>
                                                  <td>{{$project->title}}</td>
                                                    <td>{{$project->description}}</td>
                                                    <td><img class="img-fluid" style="height: 100px" src="{{asset('uploads/images/'.$project->image)}}"></td>
                                                    <td>
                                                        <i style="cursor: pointer" class="fa fa-pencil text-warning mr-2 modal-btn" data-todo='{"data":<?= json_encode($project) ?>}' data-toggle="modal" data-target="#exampleModalCenter2"></i>

                                                           <i style="cursor: pointer" class="fa fa-trash text-danger" onclick="document.getElementById('delete-form-{{$project->id}}').submit()"></i>
                                                        <form class="form-inline" action="{{route('admin.project.destroy',$project->id)}}" method="POST" id="delete-form-{{$project->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tabVerticalLeft3" aria-labelledby="baseVerticalLeft-tab3">
                                        <form >
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="{{asset('uploads/images/View Branches.png')}}" class="img-fluid" style="height: 250px">
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="banner_image">Banner Image</label>
                                                        <input type="file" id="banner_image" class="dropify form-control" required name="banner_image">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="about_content">Content</label>
                                                       <textarea class="form-control" required name="about_content" id="about_content" rows="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabVerticalLeft4" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab4">

                                        <form >
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="{{asset('uploads/images/View Branches.png')}}" class="img-fluid" style="height: 250px">
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="banner_image">Banner Image</label>
                                                        <input type="file" id="banner_image" class="dropify form-control" required name="banner_image">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="phone_number">Phone Number</label>
                                                            <input type="text" id="phone_number" class="form-control" required name="phone_number">
                                                        </div>

                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control" required name="email">
                                                    </div>

                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="about_content">Content</label>
                                                        <textarea class="form-control" required name="about_content" id="about_content" rows="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                                                    </div>
                                                </div>
                                            </div>

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

        $(document).on("click", ".modal-btn", function () {

            var data = $(this).data('todo').data;
            $('#project_id').val(data.id);
            $('#project_title1').val(data.title);
            $('#project_description1').val(data.description);
        });
    </script>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="project_title">Title</label>
                                    <input type="text" id="project_title" class="form-control" required name="project_title">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="project_description">Description</label>
                                    <textarea class="form-control" id="project_description" name="project_description" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="project_image">Image</label>
                                    <input type="file" class="dropify form-control" id="project_image" name="project_image" required>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <input type="hidden" name="project_id" id="project_id" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="project_title">Title</label>
                                    <input type="text" id="project_title1" class="form-control" required name="project_title">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="project_description">Description</label>
                                    <textarea class="form-control" id="project_description1" name="project_description" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="project_image">Image</label>
                                    <input type="file" class="dropify form-control" id="project_image" name="project_image">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection