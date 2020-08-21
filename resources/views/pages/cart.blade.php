@extends('layouts.master')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="">
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Book</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total =  0; @endphp
                                    @if($cart)
                                        @foreach($cart['value'] as $value)
                                            @php $total += $value['price'] * $value['quantity']; @endphp
                                            <tr>
                                                <td class="pro-remove"><a onclick="removeToCart({{ $value['id'] }})"><i
                                                            class="fa fa-trash-alt" style="color: red"></i></a>
                                                </td>
                                                <td class="pro-thumbnail"><a href="#"><img
                                                            src="{{ URL::to($value['image']) }}" alt="Product"></a></td>
                                                <td class="pro-title"><a href="#">{{ $value['name'] }}</a></td>
                                                <td class="pro-price"><span>£{{ $value['price'] }}</span></td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty">
                                                        <div class="count-input-block">
                                                            <input type="number" min="0" max="20"
                                                                   class="form-control text-center"
                                                                   value="{{ $value['quantity'] }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal">
                                                    <span>£{{ $value['price'] * $value['quantity'] }}</span></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="pro-title" colspan="6">No items in cart</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if($cart)
            <div class="cart-section-2">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6 col-12 dis-flex flex-right">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4><span>Cart Summary</span></h4>
                                    <p>Sub Total <span class="text-primary">£{{ $total }}</span></p>
                                    <h2>Grand Total <span class="text-primary">£{{ $total }}</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <a onclick="order({{ $cart->id }})" class="checkout-btn c-btn btn--primary">Place
                                        Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
    @include('components.remove-to-cart')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function order(id) {
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Are you Sure",
                text: "You want to place order?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel please.",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('order.complete') }}",
                        type: 'post',
                        data: {
                            id: id,
                            _token: CSRF_TOKEN,
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status === 200) {
                                location.reload();
                            } else if (data.status === 400) {
                                swal("Cancelled", "Book not found.", "error");
                            }
                        },
                    });
                } else {
                    swal("Cancelled", "It's safe.", "error");
                }
            });
        }
    </script>
@stop
