@extends('admin.layouts.main')
@section('styles')
    <style>

        @media print {

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
                <h4 class="card-title">Expense Details <button onclick="window.print()" class="btn btn-primary  float-right">print</button></h4>

                <div class="card">
                    <div class="card-header">
                        <div class="row container">
                            <div class="col-3 text-center">
                                <img src="{{asset('uploads/images/2.png')}}" class="img-fluid" style="height: 70px">
                            </div>
                            <div class="col-9">
                                <div class="text-center text-capitalize" style="font-size: 30px;color: #7740DA;">{{$campus->name}}</div><br>
                               <div class="text-center text-capitalize">{{$campus->city}}, {{$campus->province}}, PHONE # {{$campus->number}}</div>

                            </div>

                        </div>
                    </div>
                    <div class="card-content">

                        <div class="card-body card-dashboard">
                            <div class="p-2">
                              Expenditure Summary - Date From: {{$expense->date_from}} To: {{$expense->date_to}}
                            </div>
                            <table id="students_table" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>

                                    <th>Sr.#</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $expenses=json_decode($expense->expenses);
                                $count=1;
                                $total=0;
                                ?>

                                @foreach($expenses as $obj)
                                    <tr>

                                        <td>{{$count++}}</td>
                                        <td>{{$obj->description}}</td>
                                        <td>
                                            {{$obj->amount}}
                                        </td>
                                    </tr>
                                    <?php
                                    $total=(int)$obj->amount+$total;
                                    ?>
                                @endforeach

                                <tr>

                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td>
                                        {{$total}}
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection
@section('scripts')

@endsection