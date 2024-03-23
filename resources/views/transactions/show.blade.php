@section('title', 'Transaction Details Page')
@extends('admin.app')

@section('content')

{{-- <div class="container-fluid"> --}}
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold">
                    {{ __('List Of Sold Items Of Specific Product') }}
                    <a href="{{ route('transactions.index') }}" class="btn float-right text-white" style="background-color: #343a40;">
                        <span class="text">{{ __('Go Back To List') }}</span>
                    </a>
                </h6>
            </div>
            <div class="card-body">
                <div class="card-responsive">
                    <table class="table mt-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Cost Per Unit</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rs.{{ $item->base_price }}</td>
                                    <td>Rs.{{ $item->base_total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Order item not found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <h3>Total Price= Rs.{{ $transaction_total }}</h3>
                <button class="btn btn-success" onclick="notaKecil('{{ route('transactions.print_struck', ['transaction_id'=>$transaction_id]) }}', 'print_struck')">Print</button>
            </div>
        </div>
    </div>
{{-- </div> --}}

@endsection

@push('yajra-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    // tambahkan untuk delete cookie innerHeight terlebih dahulu
    document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    function notaKecil(url, title) {
        popupCenter(url, title, 625, 500);
    }

    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title,
        `
            scrollbars=yes,
            width  = ${w / systemZoom},
            height = ${h / systemZoom},
            top    = ${top},
            left   = ${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
</script>
@endpush
