@section('title', 'Add New Patient')
@extends('admin.app')

@push('banner-style')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset('myassets/css/stackpath-bootstrap-4.5.2.css')}}">
    <script src="{{asset('myassets/js/select2-4.0.8.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('myassets/css/select2@4.1.0-rc.css')}}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row ml-2 mr-2 mt-2">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header bg-gray">
                       <div class="row">
                        {{-- <div class="col"><p>New Patient</p></div> --}}
                        <div class="col text-white"><h5 style="margin-left:460px;">Add New Equipment</h5></div>
                       </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container text-gray">
                            <form id="myForm_id" method="POST" action="{{ route('submit.equipment') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" id="serial_no" name="serial_no" hidden />
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Name</label>
                                        <input type="text" class="form-control" id="patientname" name="quip_name" required>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Total Quantity</label>
                                        <input type="number" class="form-control" id="fathername" name="equip_qty" min="0" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Purchase Price</label>
                                        <input type="number" class="form-control" id="pp" name="purchase_price" value="{{old('mobile')}}" min="0" required>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Sale Price</label>
                                        <input type="number" class="form-control" id="sp" name="sale_price" min="0" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="dateField">Date:</label>
                                        <input type="date" class="form-control" id="dateField" name="equip_add_date" lang="ar" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="col">
                                        <label for="radioDropdown">Image:</label>
                                        <input class="form-control" type="file" name="img" id="equipment_img">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="radioDropdown">Equipment Type:</label>
                                        <select class="form-control" id="gender_id" name="equpment_type" required>
                                            <option name="option" selected>Select Type</option>
                                            <option name="equpments" value="cups" id="mycusp">Cups</option>
                                            <option name="equpments" value="others" id="others">Others</option>
                                        </select>
                                    </div>
                                </div>


                                {{-- <div class="form-group">
                                    <label for="textareaField">Diagnostics:</label>
                                    <textarea class="form-control" id="diagnostics" name="diagnostics" rows="3"></textarea>
                                </div> --}}

                                <div id="cardContainer" class="mt-3"></div>

                                <!-- 10 more input fields -->
                                <div class="form-row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-secondary form-control" id="submitform">Submit</button>
                                    </div>
                                </div>
                                {{-- <button type="button" class="btn btn-primary" id="addCardBtn">Add treatment</button> --}}
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Bootstrap JS -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="{{asset('myassets/js/ajax-googleapis-jquery.js')}}"></script>
    <script src="{{asset('myassets/js/stackpath-bootstrap-4.5.2.js')}}"></script>
    <!-- Optional: You can add a script to handle form submission with jQuery -->

<script>
   $(document).ready(function() {
        $("#myForm_id").submit(function() {
            $("#submitform").attr('disabled', true);
        });
    });
</script>

@endpush
