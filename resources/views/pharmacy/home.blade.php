@section('title', 'Pharmacy Home Page')
@extends('admin.app')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row ml-2 mr-2">
            <div class="col-md-6 col-lg-4 mb-4 mt-3">
                <div class="row mb-2">
                    <div class="col">
                        <form class="d-flex">
                            <input type="text" class="form-control productCode" placeholder="Scan Barcode..." />
                            <button class="btn btn-sm rounded btn-success scan">Find</button>
                        </form>
                    </div>
                </div>
                <div class="user-cart">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{route('transactions.store')}}" method="Post">
                    @csrf
                    <div class="row mt-2">
                        <div class="col">Total Price:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="total" readonly class="form-control total">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">Received:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="accept" class="form-control received">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">Return:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="return" readonly class="form-control return">
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col">Patient Name:</div>
                        <div class="col text-right">
                            <input type="text" value="" name="buyer" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger btn-block">
                                Cancel
                            </button>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">
                                Pay
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-8 mt-3">
                <div class="mb-4">
                    <input type="text" class="form-control search" placeholder="Search Product..." />
                </div>
                <div class="order-product product-search" style="display: flex; flex-wrap: wrap; row-gap: .5rem;">
                    @if(count($products) > 0)
                        @foreach ($products as $product)
                            <button type="button" class="item col-sm-3 bg-white" style="cursor: pointer; border: none;" width="150px" height="200px"
                                value="{{ $product->id }}">
                                <div class="card" style="background-color:#EAECF4;">
                                    @if(isset($product->image))
                                    <img src="{{ asset('equipments/images/' . $product->image) }}" class="card-img-top"
                                        alt="..." height="150px">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="title">{{ $product->name }}</h6>
                                        <span class="">{{ $product->sale_price }}</span>
                                    </div>
                                </div>
                            </button>
                        @endforeach
                    @else
                     <p> No record found </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('yajra-script')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Optional: You can add a script to handle form submission with jQuery -->

<script>
$(document).ready(function() {


    var total_qty = $('#qty_no').val();
    // alert(total_qty)

    function getCarts() {
        $.ajax({
            type: 'get',
            url: "getcart",
            dataType: "json",
            success: function(response) {
                let total = 0;
                $('tbody').html("");
                $.each(response.carts, function(key, product) {
                    console.log(product);
                    total += product.sale_price * product.qty

                    $('tbody').append(`
                            <tr>
                                <td>${product.product_name}</td>
                                <td class="d-flex">
                                    <select class="form-control qty">
                                        alert(product.stock);

                                    ${[...Array(parseInt(product.stock)).keys()].map((x) => (
                                        `<option ${parseInt(product.qty) == x + 1 ? 'selected' : null} value=${x + 1}>
                                                ${x + 1}
                                            </option>`
                                    ))}
                                    </select>
                                    <input
                                        type="hidden"
                                        class="cartId"
                                        value="${product.id}"
                                        />
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm delete"
                                        value="${product.id}"

                                    >
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <td class="text-right">
                                Rs${ product.qty * product.sale_price}
                                </td>
                            </tr>
                            `)
                });

                const test = $('.total').attr('value', `${total}`);
            }
        })
    }

    getCarts()

    $(document).on('change', '.received', function() {
        const received = $(this).val();
        const total = $('.total').val();
        const subTotal = received - total;
        const change = $('.return').val(subTotal);
    })


    $(document).on('change', '.qty', function() {
        const qty = $(this).val();
        const cartId = $(this).closest('td').find('.cartId').val();
        // alert(cartId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: `change-qty`,
            data: {
                qty,
                cartId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 400) {
                    alert(response.message);
                }
                getCarts()
            }
        })
    })

    $(document).on('keyup', '.search', function() {
        const search = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'get',
            url: `products-search`,
            data: {
                search
            },
            dataType: 'json',
            success: function(response) {
                $('.product-search').html("");
                $.each(response, function(key, product) {
                    $('.product-search').append(`
                            <button type="button" class="item col-sm-3 bg-white" style="cursor: pointer; border: none;" width="150px" height="200px"
                            value="${product.id}">
                            <div class="card" style="background-color:#EAECF4;">
                                @if (isset($product->image))
                                <img src="http://localhost/Hijama_And_Homeopathic_Clinic/public/equipments/images/${product.image}" class="card-img-top"
                                    alt="..." height="150px">
                                @endif
                                <div class="card-body">
                                    <h6 class="title">${product.name}</h6>
                                    <span>${product.sale_price}</span>
                                </div>
                            </div>
                            </button>
                            `)
                });
            }
        })
    })

    $(document).on('click', '.delete', function() {
        const cartId = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'get',
            url: `deletecart`,
            data: {
                cartId
            },
            success: function(response) {
                if (response.status === 400) {
                    alert(response.message);
                }
                getCarts()
            }
        })
    })

    $(document).on('click', '.item', function() {
        const productId = $(this).val();
        const type = $('.type').text();

        let row = $(this).closest('button');
        $type = row.find('.type').val();
        let itemtype = $type;
        // alert(productId);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: `createcart`,
            data: {
                productId,
                itemtype
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 400) {
                    alert(response.message);
                }
                getCarts()
            }
        })

    })


});
</script>

@endpush
