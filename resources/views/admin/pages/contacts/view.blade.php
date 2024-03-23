@extends('admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <div class="row" style="margin: 10px">
                    <div class="col-sm-6">
                        <h3><i class="fas fa-bullhorn"></i> Contact Information</h3>
                    </div>
                    <div class="col-sm-6">
                        <p style="color: green; text-align: end;"><i class="fas fa-clock"></i> Generated
                            ({{ $contact->created_at->diffForHumans() }})</p>
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <div class="row" style="padding: 20px">
                    <div class="col-sm-6">
                        <label><i class="fas fa-user"></i> Username: </label>
                        <p>{{ $contact->name }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label><i class="fas fa-envelope-open-text"></i> Email: </label>
                        <p>{{ $contact->email }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label><i class="fas fa-phone"></i> Phone Number: </label>
                        <p>{{ $contact->mobile }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label><i class="fas fa-address-card"></i> Address: </label>
                        <p>{{ $contact->address }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label><i class="fas fa-home"></i> Company: </label>
                        <p>{{ $contact->company }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label><i class="fas fa-bullhorn"></i> Job Type: </label>
                        <p>{{ $contact->job_type }}</p>
                    </div>
                    {{-- <hr> --}}
                    {{-- <label><i class="fas fa-boxes mt-3"></i> Ordered Products:</label> --}}
                    {{-- @foreach ($products as $product)
                        <div class="col-sm-6 card" style="padding: 20px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Product Name :</b> {{ $product['data']['name'] }}</p>
                                    <p><b>Brand :</b> {{ $product['data']['brand']['name'] }}</p>
                                    <p><b>Article Number :</b> {{ $product['data']['article_no'] }}</p>
                                    <p><b>Unit Of Measure :</b> {{ $product['data']['unit_of_measure'] }}</p>
                                    <p><b>Discounted Product ? :</b> {{ $product['data']['discount_type'] }}</p>
                                    <p><b>Discounted Percentage ? :</b> {{ $product['data']['product_discount'] }}%</p>
                                    <p><b>Ordered Quantity :</b> {{ $product['quantity'] }}</p>
                                </div>
                                <div class="col-sm-6" style="display: flex; justify-content: center;">
                                    <img src="{{ asset($product['data']['feature_image']) }}" width="60%"
                                        style="object-fit: contain; border-radius: 5px">
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                 </div>
            </div>
        </div>
    </div>
@endsection
