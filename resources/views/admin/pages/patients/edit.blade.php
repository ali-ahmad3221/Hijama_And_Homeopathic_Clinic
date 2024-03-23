@section('title', 'Edit Patient')
@extends('admin.app')

@push('banner-style')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset('myassets/css/stackpath-bootstrap-4.5.2.css')}}">
    <script src="{{asset('myassets/js/select2-4.0.8.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('myassets/css/select2@4.1.0-rc.css')}}">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            }

            .toggleButton {
            font-size: 15px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            }
    </style>
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="row ml-2 mr-2 mt-2">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header">
                       <div class="row">
                        <div class="col"><p>Edit Patient</p></div>
                        <div class="col text-gray"><h5 style="margin-left:200px;">Seriel Number: {{$serialNumber}}</h5></div>
                       </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container text-gray">
                            <form id="patient_Form_id" method="POST" action="{{ route('patient.update') }}">
                                @csrf
                                <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ $serialNumber }}" hidden />
                                <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ $patient->id }}" hidden/>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Name</label>
                                        <input type="text" class="form-control" id="patientname" name="patient_name" value="{{$patient->name}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">S/O, D/O, H/O</label>
                                        <input type="text" class="form-control" id="fathername" name="father_name" value="{{$patient->father_name}}" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Mobile Number</label>
                                        <input type="number" class="form-control" id="mobilenumber" name="mobile" value="{{$patient->contact_number}}" required min="0" required oninput="this.value = Math.max(0, this.value);" maxlength="15">
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Age</label>
                                        <input type="number" class="form-control" id="patientage" name="patient_age" min="0" value="{{$patient->age}}" oninput="this.value = Math.max(0, this.value);" maxlength="2">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputField1">Country:</label>
                                        <input type="text" class="col form-control" id="country_id" name="country" value="{{$country->name}}" readonly>
                                        <input type="text" class="form-control" id="country_id" name="country_id" required="required" value="{{ $country->id }}" hidden />
                                    </div>
                                    <div class="col">
                                            <label for="provincia">State</label>
                                            <select name="state_id" id="province"></select>
                                    </div>
                                    <div class="col">
                                        <label for="city">City</label><br>
                                        <select name="city_id" id="city" style="width: 300px; color:white; background-color:#494b4c !important;"></select>
                                    </div>
                                    <div class="col">
                                        <label for="inputField2">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $patient->address}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="dateField">Date:</label>
                                        <input type="date" class="form-control" id="dateField" name="treatment_date" lang="ar" value="{{ $patient->date}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="radioDropdown">Gender:</label>
                                        <select class="form-control" id="gender_id" name="patient_gender" required>
                                            <option name="option" selected>{{ $patient->gender}}</option>
                                            <option name="male" id="Male">Male</option>
                                            <option name="female" id="Female">Female</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="textareaField">Diagnostics:</label>
                                    <textarea class="form-control" id="diagnostics" name="diagnostics" rows="3">{{$patient->diagnostic}}</textarea>
                                </div>

                                <div id="cardContainer" class="mt-3"></div>

                                <!-- 10 more input fields -->

                                <button type="submit" class="btn btn-secondary" id="submitform">Submit</button>
                                <button type="button" class="btn btn-secondary" id="addCardBtn">Add treatment</button>
                            </form>

                            @php
                                $count = count($treatments);
                            @endphp
                            @if(count($treatments) > 0)
                            @foreach($treatments as $treatment)
                            <div class="card mt-3">
                                <div class="card-header bg-gray">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-white"><strong>Treatment  {{$count - $loop->iteration + 1}}</strong></p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"><button class="toggleButton text-white"><i class="fas fa-minus ml-5"></i></button></div>
                                    </div>
                                </div>
                                <div class="card-body content">
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
                                        <textarea class="form-control" id="textareaField" name="medicines" rows="3" readonly>{{$treatment->medicine}}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <span></span>
                            @endif

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
    <!-- Optional: You can add a script to handle form submission with jQuery -->
    <script src="{{asset('myassets/js/ajax-googleapis-jquery.js')}}"></script>
    <script src="{{asset('myassets/js/stackpath-bootstrap-4.5.2.js')}}"></script>

    <script>
        $(document).ready(function(){
          $(".toggleButton").click(function(e){
            $(this).closest('.card').find('.card-body').slideToggle('slow');
            $(this).find('i').toggleClass('fa-minus fa-plus');
          });
        });
    </script>

<script>
    let cardCount = 1;
    $(document).ready(function() {

        // Function to create a new card
        function createNewCard() {
            if(cardCount<2){
                let newCard = `
                <div class="card mt-3">
                    <div class="card-header bg-gray">
                        <button type="button" class="close text-white" aria-label="Close" onclick="removeCard(this)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="text-white"><strong>New Treatment</strong></p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="dateField">Points:</label>
                                <input type="text" class="form-control" id="dateField" name="hijama_points">
                            </div>
                            <div class="col">
                                <label for="radioDropdown">Fee:</label>
                                <input type="number" class="form-control" id="inputField2" name="hijama_fee" min="0">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="dateField">Date:</label>
                                <input type="date" class="form-control" id="dateField" name="hijama_date">
                            </div>
                            <div class="col">
                                <label for="radioDropdown">Points Qty</label>
                                <input type="text" class="form-control" id="inputField2" name="points_qty">
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="radioDropdown">Medicines</label>
                            <textarea class="form-control" id="textareaField" name="medicines" rows="3"></textarea>
                        </div>
                    </div>

                </div>
            `;
            $("#cardContainer").prepend(newCard);
            cardCount++;
            }
        }

        // Event listener for the "Add Card" button
        $("#addCardBtn").click(function() {
            createNewCard();
        });
    });

    // Function to remove a card
    function removeCard(element) {
        $(element).closest('.card').remove();
        cardCount = 1;
    }
</script>

<script>
    $(document).ready(function() {
         $("#patient_Form_id").submit(function() {
             $("#submitform").attr('disabled', true);
         });
     });
 </script>

<script type="text/javascript">
    var provinces = {!! $states !!}
    var patient = {!! $patient !!}
    $(document).ready(function() {
        var $provinceSelect = $("#province");
        var $province_val = $("#province").val();
        var $citySelect = $("#city");
        $provinceSelect.empty();

        $.each(provinces, function(index, province) {
            $provinceSelect.append($('<option>', {
                value: province.id, // Assuming each province has an "id" property
                text: province.name // Assuming each province has a "name" property
            }));
        });

        $(`#province option[value='${patient.state_id}']`).attr("selected", "selected");
        $provinceSelect.select2();

        var state = provinces.find(function (state) {
            return state.id === patient.state_id;
        });
        var cities = state.cities;

        $.each(cities, function(index, city) {
            $citySelect.append($('<option>', {
                value: city.id, // Assuming each province has an "id" property
                text: city.name // Assuming each province has a "name" property
            }));
        });

        $(`#city option[value='${patient.city_id}']`).attr("selected", "selected");
        $citySelect.select2();

        $provinceSelect.on('change', function() {
            var selectedProvince = $(this).val();
            $citySelect.empty();
            if (selectedProvince) {
                $.each(provinces, function(index, province) {
                    if (province.id == selectedProvince) {
                        let data = province['cities'];
                        $.each(data, function(index, city) {
                            $citySelect.append($('<option>', {
                                value: city.id,
                                text: city.name,
                                 class: 'mt-5',
                                name: 'province_id',
                            }));
                        });
                        $citySelect.select2();
                    }
                });
            }
        });


        $.each(provinces, function(index, province) {
            if (province.name == 'Azad Kashmir') {
                let data = province['cities'];
                $.each(data, function(index, city) {
                    $citySelect.append($('<option>', {
                        value: city.id,
                        text: city.name,
                        class: 'mt-5',
                        name: 'city_id',
                    }));
                });
                console.log(patient.city_id);
                $citySelect.select2();
                $(`#city option[value='${patient.city_id}']`).prop("selected", true);
            }
        });

    });

    $(document).on('load', function() {
        $provinceSelect.trigger('change');
    })
</script>

@endpush
