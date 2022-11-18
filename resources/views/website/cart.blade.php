@extends('layouts.website')
@section('content')
    <style>
        .payment-info {
            background: gray;
            padding: 50px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
        }

        .product-details {
            padding: 10px;
        }

        body {
            background: #eee;
        }

        .cart {
            background: #fff;
        }

        .p-about {
            font-size: 12px;
        }

        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
        }

        .type {
            font-weight: 400;
            font-size: 10px;
        }

        label.radio {
            cursor: pointer;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 1px 12px;
            border: 2px solid #ada9a9;
            display: inline-block;
            color: #8f37aa;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 300;
        }

        label.radio input:checked + span {
            border-color: #fff;
            background-color: blue;
            color: #fff;
        }

        .credit-inputs {
            background: rgb(102, 102, 221);
            color: #fff !important;
            border-color: rgb(102, 102, 221);
        }

        .credit-inputs::placeholder {
            color: #fff;
            font-size: 13px;
        }

        .credit-card-label {
            font-size: 9px;
            font-weight: 300;
        }

        .form-control.credit-inputs:focus {
            background: rgb(102, 102, 221);
            border: rgb(102, 102, 221);
        }

        .line {
            border-bottom: 1px solid rgb(102, 102, 221);
        }

        .information span {
            font-size: 12px;
            font-weight: 500;
        }

        .information {
            margin-bottom: 5px;
        }

        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
            box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
        }

        .spec {
            font-size: 11px;
        }
    </style>
    <div class="container mt-5 p-3 rounded cart">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <a href="{{url('/website')}}" class="d-flex flex-row align-items-center"><i
                            class="fa fa-long-arrow-left"></i><span
                            class="ml-2">Continue Shopping</span></a>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    <div class="d-flex justify-content-between"><span>You have <span
                                class="text-warning">
                                {{ count((array) session('cart')) }}
                            </span> items in your cart</span>
                        <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                            <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach((array) session('cart') as $id => $cart)
                            @if(isset($cart['price']) && isset($cart['quantity']))
                                @php
                                    $subtotal[] = (int) $cart['quantity'] * (int) $cart['price'];
                                    $discount[] = (int) $cart['price'] - ((int) $cart['discount']/100) * (int) $cart['price'];
                                @endphp
                            @endif
                            <tr data-id="{{ $id }}">
                                <td><img class="rounded" src="{{asset('storage') . '/' . $cart['image']}}"
                                         width="100px"></td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <div class="ml-2"><span
                                                class="font-weight-bold d-block">{{$cart['name']}}</span><span
                                                class="spec"><b>Discount</b> {{$cart['discount']}} %</span></div>
                                    </div>
                                </td>
                                <td data-th="Quantity">
                                    <input id="quantity" type="number" style="width: 80px;"
                                           value="{{ $cart['quantity'] }}"
                                           class="form-control quantity update-cart"/>
                                </td>
                                <td>
                                    $ {{$cart['price'] * $cart['quantity']}}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('remove.from.cart', [$cart['id']])}}">
                                        <i class="fa fa-trash-o text-danger ml-3 text-black-50"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                      data-cc-on-file="false"
                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                      id="payment-form">
                    @csrf
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img
                                class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div>
                        <span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio"
                                                                                                          name="card"
                                                                                                          value="payment"
                                                                                                          checked>
                            <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span>
                        </label>

                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/officel/48/000000/visa.png"/></span>
                        </label>

                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span>
                        </label>
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/officel/48/000000/paypal.png"/></span>
                        </label>
                        <div class="required"><label class="credit-card-label">Name on card</label><input type="text"
                                                                                                          class="form-control credit-inputs"
                                                                                                          placeholder="Name"></div>
                        <div class="required"><label class="credit-card-label">Card number</label><input type="text"
                                                                                                         class="form-control card-number credit-inputs"
                                                                                                         placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="row">

                            <div class="col-md-4 required"><label class="credit-card-label">CVV</label><input type="text"
                                                                                                              class="form-control card-cvc credit-inputs"
                                                                                                              placeholder="342">
                            </div>
                            <div class="col-md-4 required"><label class="credit-card-label">Month</label><input type="text"
                                                                                                                class="form-control card-expiry-month credit-inputs"
                                                                                                                placeholder="MM">
                            </div>
                            <div class="col-md-4 required"><label class="credit-card-label">Year</label><input type="text"
                                                                                                               class="form-control card-expiry-year credit-inputs"
                                                                                                               placeholder="YYYY">
                            </div>
                        </div>
                        <hr class="line">
                        <div class="d-flex justify-content-between information"><span>Subtotal</span>
                            @if(isset($subtotal))
                                <span>${{ array_sum($subtotal) }} </span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between information"><span>Discount</span>
                            @if(isset($discount))
                                <span>- ${{array_sum($discount)}}</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span>
                            @if(isset($subtotal) && isset($discount))
                                <span>${{$total = array_sum($subtotal)-array_sum($discount)}}</span>
                            @endif
                        </div>
                        <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="submit">
                            @if(isset($total))
                                <span>${{$total}}</span>
                            @endif
                            <span>Checkout<i
                                    class="fa fa-long-arrow-right ml-1"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".update-cart").change(function (e) {
                e.preventDefault();

                var ele = $(this);
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
