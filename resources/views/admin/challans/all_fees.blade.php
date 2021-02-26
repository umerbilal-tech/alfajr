@extends('admin.layouts.main')
@section('styles')
    <style>
        .bank_tbl tr td {
            border: 1px solid black;
            padding: 8px;
        }

        .bank_tbl2 tr td {
            border: 1px solid black;
            padding: 8px;
            border-left: none;
        }
        .bank_tbl3 tr td{
            border: 1px solid black;
            padding: 5px;
            border-left: none;
        }

        @media print {

            body * {
                visibility: hidden;
            }
            .pagebreak { visibility: visible!important; ;display:block!important;page-break-after: always;}
            .app-sidebar{
                visibility: hidden;
            }
            #challan_form, #challan_form * {
                visibility: visible;

            }


        }

    </style>
@endsection
@section('content')
    <button onclick="window.print()">print</button>
    <div class="container d-flex justify-content-center row">

        @foreach($students as $student)
        <div class="card col-8" id="challan_form">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-3 text-center">
                            <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                        </div>
                        <div class="col-9">
                            <div class="text-center text-capitalize" style="font-size: 30px;color: #7740DA;">{{$campus->name}}</div><br>
                            <div class="text-center text-capitalize">{{$campus->city}}, {{$campus->province}}, PHONE # {{$campus->number}}</div>

                        </div>

                    </div>
                    <hr>
                    <table class="bank_tbl" style="border: 1px solid black;width: 100%">
                        <tr>
                            <td rowspan="2" class="text-center" style="background: #7740DA;color: #fff;width: 60px"><span style="writing-mode: vertical-rl;">BANKS</span></td>
                            <td>Allied Bank</td>
                        </tr>

                        <tr>
                            <td>32423423423</td>
                        </tr>
                    </table>
                    <div class="row mt-2">
                        <div class="col-6">
                            <table style="width: 100%">
                                <tr>
                                    <td>Chalan No:</td>
                                    <td>112-4#Admin</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{$student->name}}</td>
                                </tr>
                                <tr>
                                    <td>Class:</td>
                                    <td>{{@$student->class->name}}</td>
                                </tr>
                                <tr>
                                    <td>Fee Category:</td>
                                    <td>{{@$student->fee_group->name}}</td>
                                </tr>
                                <tr>
                                    <td>Due Date:</td>
                                    <td class="text-danger">{{$request->due_date}}</td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-6">
                            <table style="width: 100%">
                                <tr>
                                    <td>Student ID:</td>
                                    <td>{{$student->student_id}}</td>
                                </tr>
                                <tr>
                                    <td>Father Name:</td>
                                    <td>{{$student->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>Family Code:</td>
                                    <td>{{$student->family_code}}</td>
                                </tr>
                                <tr>
                                    <td>Last Fee Status:</td>
                                    <td></td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <table style="width: 100%;border: 1px solid black;margin-top: 15px">
                        <tr>
                            <td><span style="font-weight: 500;">FP:</span></td>
                            <td>10/01/20-10/31/20</td>
                            <td><span style="font-weight: 500">Fee Month:</span></td>
                            <td>{{$fee_month->format('F Y')}}</td>
                        </tr>
                    </table>

                    <div class="row" style="padding: 15px">
                        <div class="col-6" style="padding: 0">
                            <table  style="width: 100%;border: 1px solid black">
                                <tr>
                                    <td>Conc:</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>Day Scholar</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center" style="background: #7740DA;color: #fff">PREVIOUS FEE SUMMARY</td>
                                </tr>
                            </table>
                            <table class="text-center" style="width: 100%;border: 1px solid black;border-top: none;">
                                <tr style="background: #7740DA;color: #fff">
                                    <td style="padding-bottom: 10px;">Month</td>
                                    <td style="padding-bottom: 10px;">Paid</td>
                                    <td style="padding-bottom: 10px;">Arrear/Amount</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>

                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>DEC-2019</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </table>
                        </div>



                        <div class="col-6" style="padding: 0">
                            <table class="bank_tbl3"  style="width: 100%">
                                <tr>
                                    <td>Tution Fee</td>
                                    <td>{{$student->decided_fee}}</td>

                                </tr>
                                <tr>
                                    <td>Books + St.Ch</td>
                                    <td>{{$request->books_st}}</td>
                                </tr>
                                <tr>
                                    <td>Registration Fee</td>
                                    <td>{{$request->admission_fee}}</td>

                                </tr>
                                <tr>
                                    <td>Exam Fee</td>
                                    <td>{{$request->exam_fee}}</td>

                                </tr>
                                <tr>
                                    <td>Annal/Qtr.Ch</td>
                                    <td>{{$request->annual_fund}}</td>

                                </tr>
                                <tr>
                                    <td>Van Charges</td>
                                    <td>{{$request->van_charges}}</td>

                                </tr>
                                <tr>
                                    <td>Misc</td>
                                    <td>{{$request->misc}}</td>

                                </tr>
                                <tr>
                                    <td>Arrears</td>
                                    <td>{{$request->arrears}}</td>

                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{$request->discount}}</td>
                                </tr>
                                <tr  style="background: #7740DA;color: #fff">
                                    <td >With in Due Date</td>
                                    <td>{{(int)$student->decided_fee-(int)$request->discount}}</td>
                                </tr>
                                <tr>
                                    <td>Late Fee Fine</td>
                                    <td>{{$request->late_fine}}</td>
                                </tr>
                                <tr class="bg-danger text-white">
                                    <td>After Due Date</td>
                                    <td>{{(int)$student->decided_fee+(int)$request->late_fine-(int)$request->discount}}</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="row" style="padding: 15px">
                        <div class="col-12" style="border: 1px solid black;padding: 30px">

                        </div>
                        <div class="col-12" style="padding-left: 0;margin-top: 10px">
                            <p style="margin-bottom: 0"><span style="font-weight: 500">01:</span> The Chalan must be deposited with in due date to avoid late payment fine. Which is Rs. 0/- after due date.</p>
                            <p style="margin-bottom: 0"><span style="font-weight: 500">02:</span> The fee only be deposited in designated banks</p>
                            <p style="margin-bottom: 0"><span style="font-weight: 500">03:</span> BANK will not entertain this voucher after 25/10/2020</p>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="pagebreak"></div>
        @endforeach
    </div>
@endsection