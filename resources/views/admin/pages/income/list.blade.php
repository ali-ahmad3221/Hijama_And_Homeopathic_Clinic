@section('title', 'Products List')
@extends('admin.app')

@push('banner-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('myassets/css/twitter-bootstraps-5.0.1.css') }}">
    <link rel="stylesheet" href="{{ asset('myassets/css/dataTables-bootstraps5.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .text-bold {
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row ml-2 mr-2">
            <div class="col-md-12">
                <form action="{{ route('patients.income') }}" method="get" style="height:70px;">
                    @csrf
                    <input type="hidden" name="user_id" id="id" value="">
                    <div class="row mb-5 ml-2">

                        <div class="col-sm-5">
                            <div class="col-sm-12"
                                style="margin-bottom: -17px; position: relative; font-size: 80%; z-index: 12;">
                                <label style="background-color: white; color: #003480;" class="rounded-pill pl-1 pr-1 ml-2">
                                    From
                                </label>
                            </div>
                            <div class="col-sm-12 p-0">

                                <input type="date" name="startdate" class="form-control" value=""
                                    style="border: 1px solid #003480; border-radius: 10px; position: relative; z-index: 10;" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12"
                                style="margin-bottom: -17px; position: relative; font-size: 80%; z-index: 12;">
                                <label style="background-color: white; color: #003480;" class="rounded-pill pl-1 pr-1 ml-2"> To
                                </label>
                            </div>

                            <div class="col-sm-12 p-0">
                                <input type="date" name="enddate" class="form-control" value=""
                                    style="border: 1px solid #003480; border-radius: 10px; position: relative; z-index: 10; " />
                            </div>
                        </div>
                        <div class="col-sm-1 m-auto pt-2 pl-0 text-center">
                            <span>
                                <button class="btn btn-success pl-3 pr-3"
                                    style="border-radius: 10px;background-color: #172b4d"> <i
                                        class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>


                <div class="card mt-2">
                    <div class="card-header bg-gray">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    
                                    <div class="col-sm-2">
                                        <a href="{{route('patients.income')}}" class="btn btn-gray text-white" style="border-radius: 10px;background-color: #172b4d;">
                                            Total
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <a href="{{route('my.today.income')}}" class="btn btn-gray text-white" style="border-radius: 10px;background-color: #172b4d;">
                                            Today
                                        </a>
                                   </div>

                                   <div class="col-sm-6">
                                        <a href="{{route('this.month.income')}}" class="btn btn-gray text-white" style="border-radius: 10px;background-color: #172b4d;">
                                            Monthly
                                        </a>
                                   </div>
                                </div>
                            </div>

                            <!-- <div class="col"></div> -->
                            <div class="col" style="margin-left:200px;"><strong>Total Income = {{ $patient_fee_sum }}</strong></div>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-bordered data-table text-center">
                            <thead>
                                <tr>
                                    <th>Sr #.</th>
                                    <th>Patient Name</th>
                                    <th>Patient Code</th>
                                    <th>Treatment Date</th>
                                    <th>Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($treatments) > 0)
                                    @foreach ($treatments as $treatment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $treatment->patient->name ? $treatment->patient->name : '' }}</td>
                                            <td>{{ $treatment->patient->serial_num ? $treatment->patient->serial_num : '' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($treatment->date)->format('d-F-Y') }}</td>
                                            <td>{{ $treatment->fee }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('yajra-script')
    <!-- DataTables & Plugins -->
    <style>
        .dataTables_wrapper {
            font-size: 14px;
        }

        .dataTables_length select {
            width: auto;
            display: inline-block;
            margin-left: 5px;
        }

        .dataTables_info {
            font-size: 14px;
        }

        .dataTables_paginate {
            font-size: 14px;
        }

        .table thead th,
        .table tbody td {
            white-space: nowrap;
        }
    </style>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="asset('myassets/js/bootstrap-bundle-4.6.2.js')"></script>
    <script>
        $(document).ready(function () {
            $('.data-table').DataTable({
                responsive: true,
                buttons: ['copy', 'excel', 'pdf', 'print'],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
            });
        });
    </script>
@endpush
