@section('title', 'Add New Patient')
@extends('admin.app')

@push('banner-style')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset('myassets/css/stackpath-bootstrap-4.5.2.css')}}">
    <script src="{{asset('myassets/js/select2-4.0.8.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('myassets/css/select2@4.1.0-rc.css')}}">
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="row ml-2 mr-2">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            {{-- <div class="col"><p>New Patient</p></div> --}}
                            <div class="col text-gray">
                                <h5 style="margin-left:460px;">View Equipment</h5>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body" style="margin-left:200px;">
                        <div class="container text-gray">
                            {{-- <form id="myForm_id" method="POST" action="{{ route('submit.equipment', ) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" id="serial_no" name="serial_no" hidden value="{{$equipment->id}}"/>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Name</label> @dump($equipment->name);
                                        <input type="text" class="form-control" id="equip_name" name="quip_name" value="{{$equipment->name}}" required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Total Quantity</label>
                                        <input type="number" class="form-control" id="total_qty" name="equip_qty" min="0" value="{{$equipment->total_qty}}" required readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Purchase Price</label>
                                        <input type="number" class="form-control" id="pp" name="purchase_price" min="0"  value="{{$equipment->purchase_price}}" required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Sale Price</label>
                                        <input type="number" class="form-control" id="sp" name="sale_price" min="0"  value="{{$equipment->sale_price}}" required readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="dateField">Date:</label>
                                        <input type="date" class="form-control" id="dateField" name="equip_add_date" lang="ar" value="{{$equipment->date}}" required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="radioDropdown">Image:</label>
                                        <img src="{{ asset('public/equipments/'.$equipment->image) }}" alt="Equipment Image" style="max-width: 200px;">

                                    </div>
                                </div>

                                <div id="cardContainer" class="mt-3"></div>

                                <button type="submit" class="btn btn-primary form-control" id="submitform">Update</button>
                            </form> --}}
                            <div class="card" style="width: 28rem;">
                                <img class="card-img-top" src="{{ asset('equipments/images/' . $equipment->image) }}"
                                    alt="Card image cap" height="300px">
                                <div class="card-body">

                                    <table class="form-content">
                                        <tr>
                                            <td colspan="1">Name:</td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2">{{ $equipment->name }}</td>
                                            <h5><strong></strong></h5><br>
                                        </tr>
                                        <tr>
                                            <td colspan="1">purchase price:</td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td colspan="3">{{$equipment->purchase_price}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">Sale Price:</td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td colspan="3"></td>
                                            <td>{{$equipment->sale_price}}</td>
                                        </tr>
                                    </table>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('yajra-script')
    <!-- jQuery -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <!-- Bootstrap JS -->
    <!-- Optional: You can add a script to handle form submission with jQuery -->
    <script src="{{asset('myassets/js/ajax-googleapis-jquery.js')}}"></script>
    <script src="{{asset('myassets/js/stackpath-bootstrap-4.5.2.js')}}"></script>

    <script>
        $(document).ready(function() {
            $("#myForm_id").submit(function() {
                $("#submitform").attr('disabled', true);
            });
        });
    </script>
@endpush
