@section('title','Products List')
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
        .text-bold{
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row ml-2 mr-2 mt-2">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="text-success">{{$treatment_name}}  Equipment Logs</h5>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <table class="table table-bordered data-table text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Total Qty</th>
                                    <th>Stock In</th>
                                    <th>Stock Out</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($treatments)>0)
                                    @foreach ($treatments as $treatment)
                                        <tr>
                                            <td>{{$treatment->id}}</td>
                                            <td>{{$treatment->total_qty}}</td>
                                            <td>{{$treatment->stockin}}</td>
                                            <td>{{$treatment->stockout}}</td>
                                            <td>{{$treatment->purchase_price}}</td>
                                            <td>{{$treatment->sale_price}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No record found</p>
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   -->
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script> --}}
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="asset('myassets/js/bootstrap-bundle-4.6.2.js')"></script>
@endpush
