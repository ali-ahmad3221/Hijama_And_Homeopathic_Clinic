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
                        <div class="col text-gray"><h5 style="margin-left:380px;">View Treatement</h5></div>
                       </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container text-gray">
                            <form method="POST" action="{{ route('update.treatment') }}">
                                @csrf
                                <input type="text" class="form-control" name="treatement_id" value="{{$treatment->id}}"  hidden/>
                                <div class="card mt-3">
                                    <div class="card-header bg-gray">
                                        <div class="row">
                                            <div class="col"><p class="text-white"><strong>Treatment {{$treatment->id}}</strong></p></div>
                                            <div class="col"><a href="{{route('specific.patient.treatments', ['patient_id'=>$patient_id])}}" class="badge badge-outline-success badge-white" id="submitform" name="treatment_id" value={{$treatment_id}} style="margin-left:350px; border:1px solid #F7F7F7">Back</a></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="dateField">Points:</label>
                                                <input type="text" class="form-control" id="dateField" name="hijama_points" value="{{$treatment->points}}" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="radioDropdown">Fee:</label>
                                                <input type="number" class="form-control" id="inputField2" name="hijama_fee" value="{{$treatment->fee}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="dateField">Date:</label>
                                                <input type="date" class="form-control" id="dateField" name="hijama_date" value="{{$treatment->date}}" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="radioDropdown">Points Qty</label>
                                                <input type="text" class="form-control" id="inputField2" name="points_qty" value="{{$treatment->point_qty}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <label for="radioDropdown">Medicines</label>
                                            <textarea class="form-control" id="textareaField" name="medicines" rows="3" value="" readonly>{{$treatment->medicine}}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- 10 more input fields -->
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
