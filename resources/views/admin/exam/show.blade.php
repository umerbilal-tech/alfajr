@extends('admin.layouts.main')
@section('content')

    <!--About section starts-->
    <section id="about">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Exam Detail</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="no-list-style row">
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Exam:</a></span>
                                    <span class="d-block overflow-hidden">{{$exam->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Class:</a></span>
                                    <span class="d-block overflow-hidden">{{@$exam->class->name}}</span>
                                </li>

                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Group:</a></span>
                                    <span class="d-block overflow-hidden">{{@$exam->group->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a>Section:</a></span>
                                    <span class="d-block overflow-hidden">{{@$exam->section->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4">
                                    <span class="text-bold-500 primary"><a> Student:</a></span>
                                    <span class="d-block overflow-hidden">{{@$exam->student->name}}</span>
                                </li>
                                <li class="mb-2 col-12 col-md-6 col-lg-4 ">
                                    <span class="text-bold-500 primary"><a>Date:</a></span>
                                    <span class="d-block overflow-hidden">{{$exam->date}}</span>
                                </li>




                            </ul>
                            <hr>
                            <h4>Subjects Details</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Total Marks</th>
                                    <th>Obtained</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

								$results=json_decode(@$exam->result);

								?>
                                @foreach($results as $result)
									<?php

									$subject=\App\Subject::find($result->subject_id);

									?>
                                    <tr>
                                        <td>{{@$subject->name}}</td>
                                        <td>{{@$result->total}}</td>
                                        <td>{{@$result->obtained}}</td>
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
    <!--About section ends-->

@endsection