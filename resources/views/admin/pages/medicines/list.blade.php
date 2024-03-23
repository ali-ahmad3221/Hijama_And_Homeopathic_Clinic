@section('title','Medicine List')
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
        .mybuttons {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row ml-2 mr-2">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <li>{{session('success')}}</li>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <a href="" class="btn btn-primary btn-sm" data-bs-target="#myModal" data-bs-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Add Medicine</a>
                    </div>

                    <div class="modal fade" id="myModal" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
                        <div class="modal-dialog modal-lg" style="margin-top: 10%; margin-left:30%;">
                            <div class="modal-content mt-5">
                                <div class="modal-header">
                                    <h5 class="modal-title text-success" id="addnewmedicine" style="margin-left:40%;">Add New Medicine</h5>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{route('medicine.submit')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input class="form-control" id="medi_name" type="text" name="name"
                                                placeholder="Enter Medicine Name" style="border: none; border-bottom:1px solid rgb(21, 115, 71);" required/>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <input class="form-control" id="medi_desc" type="text" name="description"
                                                aria-describedby="emailHelp" placeholder="Enter Medicine Description" style="border: none; border-bottom:1px solid rgb(21, 115, 71);" required/>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" id="medi_diagnostic" type="text" name="diagnostic"
                                                placeholder="Enter Medicine Diagnostic" style="border: none; border-bottom:1px solid rgb(21, 115, 71);" required/>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" id="medi_cause" type="text" name="cause"
                                                placeholder="Enter Medicine Cause" style="border: none; border-bottom:1px solid rgb(21, 115, 71);" required/>
                                        </div> -->
                                        <div class="mb-3">
                                            <input class="form-control" id="medi_price" type="number" name="purchase_price" min="0"
                                                placeholder="Enter Medicine Purchase Price" style="border: none; border-bottom:1px solid rgb(21, 115, 71);" required/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger px-5 mt-5 p-2 text-white" data-bs-dismiss="modal" type="button">
                                            Close
                                        </button>
                                        <button  class="btn btn-success px-5 mt-5 p-2 text-white" id="confirmButton" type="Submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <table class="table table-bordered data-table text-center table-border">
                            <thead>
                                <tr>
                                    <th>No #.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th width="105px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="asset('myassets/js/bootstrap-bundle-4.6.2.js')"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            var table = $('.data-table').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                processing: true,
                serverSide: true,
                ajax: "{{ route(Route::current()->getName())}}",
                searchDelay: 1000,
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        className: 'myids'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'purchase_price',
                        name: 'purchase_price'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'mystatus'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                {
                    text: 'All Medicines',
                    className: "btn-primary {{ Route::current()->getName() === '' ? 'active text-primary bg-white text-bold' : '' }}",
                    action: function(e, dt, node, config) {
                        window.location.href = "{{route('medicine.list')}}"
                    }
                },
                {
                    text: 'Available',
                    className: "ml-2 btn-primary {{ Route::current()->getName() === '' ? 'active text-primary bg-white text-bold' : '' }}",
                    action: function(e, dt, node, config) {
                        window.location.href = "{{route('available.medicine.list')}}"
                    }
                },
                {
                    text: 'Out of Stock',
                    className: "ml-2 btn-primary {{ Route::current()->getName() === '' ? 'active text-primary bg-white text-bold' : '' }}",
                    action: function(e, dt, node, config) {
                        window.location.href = "{{route('out.medicine.list')}}"
                    }
                },

                ],
            });
        });
    </script>

    <script>
        function showButtons(rowId){
            $('#mybuttons_'+rowId).toggle();
        }
    </script>
@endpush
