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
                <div class="card mt-2">
                    <div class="card-header">
                       <div class="row">
                        {{-- <div class="col"><p>New Patient</p></div> --}}
                        <div class="col text-gray"><h5 style="margin-left:380px;">View Medicine</h5></div>
                       </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container text-gray">
                            <form method="POST" action="{{ route('medicine.update') }}">
                                @csrf
                                <input type="text" class="form-control" name="treatement_id" value="{{$medicine->id}}"  hidden/>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="dateField">Name:</label>
                                                <input type="text" class="form-control" id="dateField" name="name" value="{{$medicine->name}}" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="radioDropdown">Cause:</label>
                                                <input type="text" class="form-control" id="inputField2" name="cause" value="{{$medicine->cause}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="dateField">Description:</label>
                                                <input type="text" class="form-control" id="dateField" name="description" value="{{$medicine->description}}" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="radioDropdown">Diagnostic:</label>
                                                <input type="text" class="form-control" id="inputField2" name="diagnostic" value="{{$medicine->diagnostic}}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- 10 more input fields -->

                                {{-- <button type="submit" class="btn btn-primary" id="submitform">Submit</button> --}}
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

@endpush
