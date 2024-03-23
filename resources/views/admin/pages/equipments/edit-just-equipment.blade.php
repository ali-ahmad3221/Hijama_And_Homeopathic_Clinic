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
        <div class="row ml-2 mr-2 mt-2">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                       <div class="row">
                        {{-- <div class="col"><p>New Patient</p></div> --}}
                        <div class="col text-success"><h5 style="margin-left:460px;">Just Edit Equipment No Logs Will be Create</h5></div>
                       </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container text-gray">
                            <form id="myForm_id" method="POST" action="{{ route('update.just.equipment')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" id="equip_id" name="equipment_id" value="{{$equipment->id}}" hidden/>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Name</label>
                                        <input type="text" class="form-control" id="equip_name" name="quip_name" value="{{$equipment->name}}" required>
                                    </div>
                                    <div class="col">
                                        {{-- <label for="inputField2">Total Quantity</label>
                                        <input type="number" class="form-control" id="total_qty" name="equip_qty" min="0" value="{{$equipment->total_qty}}" required> --}}
                                        <div class="col">
                                            <label for="inputField2">Total Quantity</label> <span class="ml-5">(Available Stock: {{$equipment->stockin}})</span>
                                            <input type="number" class="form-control" id="total_qty" name="equip_qty" min="0" value="0" disabled required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Purchase Price</label>
                                        <input type="number" class="form-control" id="pp" name="purchase_price" min="0"  value="{{$equipment->purchase_price}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Sale Price</label>
                                        <input type="number" class="form-control" id="sp" name="sale_price" min="0"  value="{{$equipment->sale_price}}" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="dateField">Date:</label>
                                        <input type="date" class="form-control" id="dateField" name="equip_add_date" lang="ar" value="{{$equipment->date}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="radioDropdown">Image:</label>
                                        <img src="{{ asset('equipments/images/' . $equipment->image) }}" alt="Equipment Image" style="max-width: 50px;">
                                        <input value="" class="form-control" type="file" name="img" id="equipment_img" accept="image/jpeg">
                                    </div>
                                </div>

                                <div id="cardContainer" class="mt-3"></div>

                                <!-- 10 more input fields -->

                                <button type="submit" class="btn btn-primary form-control" id="submitform">Update</button>
                            </form>

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
