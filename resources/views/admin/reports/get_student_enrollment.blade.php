@extends('admin.layouts.main')
@section('styles')
    <style>
      .card-title span{
          border: 1px solid black;
          padding: 4px;
      }

        @media print {
            @page {size: landscape}
            body * {
                visibility: hidden;
            }
            .app-sidebar{
                visibility: hidden;
            }
            .card, .card * {
                visibility: visible;

            }


        }

    </style>
@endsection
@section('content')
    <!-- Zero configuration table -->
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <button onclick="window.print()">print</button>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3 text-center">
                                <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                            </div>
                            <div class="col-9">
                                <div class="text-center text-capitalize" style="font-size: 30px;color: #7740DA;">{{$campus->name}}</div><br>
                                <div class="text-center text-capitalize">{{$campus->city}}, {{$campus->province}}, PHONE # {{$campus->number}}</div>

                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>

                        </div>
                        <h6 class="card-title" style="font-size: inherit"><span>STUDENT ENROLLMENT SHEET</span> - <span>Class:{{$class->name}}</span> - <span>Section:{{$section->name}}</span> - <span>Group:{{$group->name}}</span> - <span>Tution Fee:{{@$fee->fee}}</span> </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <table id="groups_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>Sr.No#</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Father's Name</th>
                                    <th>Postal Address</th>
                                    <th>Phone No.</th>
                                    <th>Status</th>

                                    <th>Conc.</th>
                                    <th>Tut. Fee</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$count=1;
								$conc=0;
								$total=0;
								?>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->father_name}}</td>
                                        <td>{{$student->address}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->status}}</td>
                                        <td>{{$student->fee_concession}}</td>
                                        <td>{{$student->decided_fee}}</td>
                                    </tr>
                                    <?php
                                    $conc=$conc+(int)$student->fee_concession;
                                    $total=$total+(int)$student->decided_fee;
                                    ?>
                                @endforeach

                                </tbody>
                            </table>
                           <div class="row">
                               <div class="col-sm-4">
                                   <h6>Total Students: <span class="text-danger text-bold-500">{{$students->count()}}</span></h6>
                               </div>
                               <div class="col-sm-4">
                                   <h6>Total Conc: <span class="text-danger text-bold-500">{{$conc}}</span></h6>
                               </div>
                               <div class="col-sm-4">
                                   <h6>Total Fee: <span class="text-danger text-bold-500">{{$total}}</span></h6>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection
@section('scripts')
    <script>

    </script>
@endsection