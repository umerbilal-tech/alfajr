@extends('admin.layouts.main')
@section('styles')
    <style>
        table tr td{
            font-size: 10px;
        }
        .bank_tbl tr td {
            font-size: 10px;
            border: 1px solid grey;
            padding: 8px;
        }

        .bank_tbl2 tr td {
            font-size: 10px;
            border: 1px solid grey;
            padding: 8px;
            border-left: none;
        }
        .bank_tbl3 tr td{
            font-size: 10px;
            border: 1px solid grey;
            padding: 5px;
            border-left: none;
        }
        .fee_list{
            padding-bottom: 10px
        }
        @page { size: landscape; }

        @media print {
            body * {
                visibility: hidden;
            }
            .app-sidebar{
                visibility: hidden;
            }
            #challan_form, #challan_form * {
                visibility: visible;

            }
            .bank_tbl3 tr td{

                padding: 4px;

            }
            .fee_list{
                padding-bottom: 0
            }
            .after_due td{
                padding-top: 12px!important;
                padding-bottom: 9px!important;
            }
        }

    </style>
@endsection
@section('content')
    <button onclick="window.print()">print</button>
    <div class="row bg-white"  id="challan_form" style="width: 100%;padding: 5px;margin: 0;">

        <div class="col-4" style="border-right: 1px dashed grey;">

            <div>
                <div class="row mt-2">
                    <div class="col-3 text-center">
                        <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                    </div>
                    <div class="col-9">
                        <span style="font-size: 20px;color: #7740DA;">Fatima Tuz Zahra Girls College</span><br>
                        <div class="text-center" style="font-size: 10px">KOTLI, AZAD KASHMIR, PHONE # 1213123</div>

                    </div>

                </div>
                <hr>
                <table class="bank_tbl" style="border: 1px solid grey;width: 100%">
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
                                <td>Jhon</td>
                            </tr>
                            <tr>
                                <td>Class:</td>
                                <td>10th A</td>
                            </tr>
                            <tr>
                                <td>Fee Category:</td>
                                <td>General</td>
                            </tr>
                            <tr>
                                <td>Due Date:</td>
                                <td class="text-danger">10-11-2020</td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-6">
                        <table style="width: 100%">
                            <tr>
                                <td>Student ID:</td>
                                <td>234</td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td>Doe</td>
                            </tr>
                            <tr>
                                <td>Family Code:</td>
                                <td>123</td>
                            </tr>
                            <tr>
                                <td>Last Fee Status:</td>
                                <td>sep-2020</td>
                            </tr>

                        </table>

                    </div>
                </div>
                <table style="width: 100%;border: 1px solid grey;margin-top: 15px">
                    <tr>
                        <td><span style="font-weight: 500;">FP:</span></td>
                        <td>10/01/20-10/31/20</td>
                        <td><span style="font-weight: 500">Fee Month:</span></td>
                        <td>Oct-2020</td>
                    </tr>
                </table>

                <div class="row" style="padding: 15px">
                    <div class="col-6" style="padding: 0">
                        <table  style="width: 100%;border: 1px solid grey">
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
                        <table class="text-center" style="width: 100%;border: 1px solid grey;border-top: none;">
                            <tr style="background: #7740DA;color: #fff">
                                <td class="fee_list">Month</td>
                                <td class="fee_list">Paid</td>
                                <td class="fee_list">Arrear/Amount</td>
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
                                <td>14000</td>

                            </tr>
                            <tr>
                                <td>Books + St.Ch</td>
                                <td>Day Scholar</td>
                            </tr>
                            <tr>
                                <td>Registration Fee</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Exam Fee</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Annal/Qtr.Ch</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Van Charges</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Arrears</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>0</td>
                            </tr>
                            <tr  style="background: #7740DA;color: #fff">
                                <td >With in Due Date</td>
                                <td>14000</td>
                            </tr>
                            <tr>
                                <td>Late Fee Fine</td>
                                <td>0</td>
                            </tr>
                            <tr class="after_due bg-danger text-white">
                                <td>After Due Date</td>
                                <td>14000</td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="row" style="padding: 15px">
                    <div class="col-12" style="border: 1px solid grey;padding: 30px">

                    </div>
                    <div class="col-12" style="padding-left: 0;margin-top: 10px">
                        <p style="margin-bottom: 0"><span style="font-weight: 500">01:</span> The Chalan must be deposited with in due date to avoid late payment fine. Which is Rs. 0/- after due date.</p>
                        <p style="margin-bottom: 0"><span style="font-weight: 500">02:</span> The fee only be deposited in designated banks</p>
                        <p style="margin-bottom: 0"><span style="font-weight: 500">03:</span> BANK will not entertain this voucher after 25/10/2020</p>

                    </div>
                    <div class="col-12 mt-2" style="padding-left: 0;">
                        <span class="float-left" style="font-weight: 500">Bank Copy</span>
                        <span class="float-right"  style="font-weight: 500">Issue Date: 05-11-2020</span>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-4" style="border-right: 1px dashed grey;">

            <div>
                <div class="row mt-2">
                    <div class="col-3 text-center">
                        <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                    </div>
                    <div class="col-9">
                        <span style="font-size: 20px;color: #7740DA;">Fatima Tuz Zahra Girls College</span><br>
                        <div class="text-center" style="font-size: 10px">KOTLI, AZAD KASHMIR, PHONE # 1213123</div>

                    </div>

                </div>
                <hr>
                <table class="bank_tbl" style="border: 1px solid grey;width: 100%">
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
                                <td>Jhon</td>
                            </tr>
                            <tr>
                                <td>Class:</td>
                                <td>10th A</td>
                            </tr>
                            <tr>
                                <td>Fee Category:</td>
                                <td>General</td>
                            </tr>
                            <tr>
                                <td>Due Date:</td>
                                <td class="text-danger">10-11-2020</td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-6">
                        <table style="width: 100%">
                            <tr>
                                <td>Student ID:</td>
                                <td>234</td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td>Doe</td>
                            </tr>
                            <tr>
                                <td>Family Code:</td>
                                <td>123</td>
                            </tr>
                            <tr>
                                <td>Last Fee Status:</td>
                                <td>sep-2020</td>
                            </tr>

                        </table>

                    </div>
                </div>
                <table style="width: 100%;border: 1px solid grey;margin-top: 15px">
                    <tr>
                        <td><span style="font-weight: 500;">FP:</span></td>
                        <td>10/01/20-10/31/20</td>
                        <td><span style="font-weight: 500">Fee Month:</span></td>
                        <td>Oct-2020</td>
                    </tr>
                </table>

                <div class="row" style="padding: 15px">
                    <div class="col-6" style="padding: 0">
                        <table  style="width: 100%;border: 1px solid grey">
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
                        <table class="text-center" style="width: 100%;border: 1px solid grey;border-top: none;">
                            <tr style="background: #7740DA;color: #fff">
                                <td class="fee_list">Month</td>
                                <td class="fee_list">Paid</td>
                                <td class="fee_list">Arrear/Amount</td>
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
                                <td>14000</td>

                            </tr>
                            <tr>
                                <td>Books + St.Ch</td>
                                <td>Day Scholar</td>
                            </tr>
                            <tr>
                                <td>Registration Fee</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Exam Fee</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Annal/Qtr.Ch</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Van Charges</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Arrears</td>
                                <td>0</td>

                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>0</td>
                            </tr>
                            <tr  style="background: #7740DA;color: #fff">
                                <td >With in Due Date</td>
                                <td>14000</td>
                            </tr>
                            <tr>
                                <td>Late Fee Fine</td>
                                <td>0</td>
                            </tr>
                            <tr class="after_due bg-danger text-white">
                                <td>After Due Date</td>
                                <td>14000</td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="row" style="padding: 15px">
                    <div class="col-12" style="border: 1px solid grey;padding: 30px">

                    </div>
                    <div class="col-12" style="padding-left: 0;margin-top: 10px">
                        <p style="margin-bottom: 0"><span style="font-weight: 500">01:</span> The Chalan must be deposited with in due date to avoid late payment fine. Which is Rs. 0/- after due date.</p>
                        <p style="margin-bottom: 0"><span style="font-weight: 500">02:</span> The fee only be deposited in designated banks</p>
                        <p style="margin-bottom: 0"><span style="font-weight: 500">03:</span> BANK will not entertain this voucher after 25/10/2020</p>

                    </div>
                    <div class="col-12 mt-2" style="padding-left: 0;">
                        <span class="float-left" style="font-weight: 500">Office Copy</span>
                        <span class="float-right"  style="font-weight: 500">Issue Date: 05-11-2020</span>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-4">

                <div>
                    <div class="row mt-2">
                        <div class="col-3 text-center">
                            <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                        </div>
                        <div class="col-9">
                            <span style="font-size: 20px;color: #7740DA;">Fatima Tuz Zahra Girls College</span><br>
                            <div class="text-center" style="font-size: 10px">KOTLI, AZAD KASHMIR, PHONE # 1213123</div>

                        </div>

                    </div>
                    <hr>
                    <table class="bank_tbl" style="border: 1px solid grey;width: 100%">
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
                                    <td>Jhon</td>
                                </tr>
                                <tr>
                                    <td>Class:</td>
                                    <td>10th A</td>
                                </tr>
                                <tr>
                                    <td>Fee Category:</td>
                                    <td>General</td>
                                </tr>
                                <tr>
                                    <td>Due Date:</td>
                                    <td class="text-danger">10-11-2020</td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-6">
                            <table style="width: 100%">
                                <tr>
                                    <td>Student ID:</td>
                                    <td>234</td>
                                </tr>
                                <tr>
                                    <td>Father Name:</td>
                                    <td>Doe</td>
                                </tr>
                                <tr>
                                    <td>Family Code:</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>Last Fee Status:</td>
                                    <td>sep-2020</td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <table style="width: 100%;border: 1px solid grey;margin-top: 15px">
                        <tr>
                            <td><span style="font-weight: 500;">FP:</span></td>
                            <td>10/01/20-10/31/20</td>
                            <td><span style="font-weight: 500">Fee Month:</span></td>
                            <td>Oct-2020</td>
                        </tr>
                    </table>

                    <div class="row" style="padding: 15px">
                        <div class="col-6" style="padding: 0">
                            <table  style="width: 100%;border: 1px solid grey">
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
                            <table class="text-center" style="width: 100%;border: 1px solid grey;border-top: none;">
                                <tr style="background: #7740DA;color: #fff">
                                    <td class="fee_list">Month</td>
                                    <td class="fee_list">Paid</td>
                                    <td class="fee_list">Arrear/Amount</td>
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
                                    <td>14000</td>

                                </tr>
                                <tr>
                                    <td>Books + St.Ch</td>
                                    <td>Day Scholar</td>
                                </tr>
                                <tr>
                                    <td>Registration Fee</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Exam Fee</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Annal/Qtr.Ch</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Van Charges</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Misc</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Arrears</td>
                                    <td>0</td>

                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>0</td>
                                </tr>
                                <tr  style="background: #7740DA;color: #fff">
                                    <td >With in Due Date</td>
                                    <td>14000</td>
                                </tr>
                                <tr>
                                    <td>Late Fee Fine</td>
                                    <td>0</td>
                                </tr>
                                <tr class="after_due bg-danger text-white">
                                    <td>After Due Date</td>
                                    <td>14000</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="row" style="padding: 15px">
                        <div class="col-12" style="border: 1px solid grey;padding: 30px">

                        </div>
                        <div class="col-12" style="padding-left: 0;margin-top: 10px">
                            <p style="margin-bottom: 0"><span style="font-weight: 500">01:</span> The Chalan must be deposited with in due date to avoid late payment fine. Which is Rs. 0/- after due date.</p>
                            <p style="margin-bottom: 0"><span style="font-weight: 500">02:</span> The fee only be deposited in designated banks</p>
                            <p style="margin-bottom: 0"><span style="font-weight: 500">03:</span> BANK will not entertain this voucher after 25/10/2020</p>

                        </div>
                        <div class="col-12 mt-2" style="padding-left: 0;">
                            <span class="float-left" style="font-weight: 500">Student Copy</span>
                            <span class="float-right"  style="font-weight: 500">Issue Date: 05-11-2020</span>
                        </div>
                    </div>


                </div>

        </div>
    </div>
@endsection