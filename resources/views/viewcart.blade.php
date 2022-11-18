@extends('layouts.website')
@section('content')
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

@endsection
