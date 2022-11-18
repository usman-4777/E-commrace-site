@extends('layouts.website')
@section('content')
                <table class="table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order->ref_id }}</td>
                            <td><img class="rounded" src="{{asset('storage') . '/' . $order->product->image}}"
                                     width="100px">
                            </td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>$ {{ $order->discount }}</td>
                            <td>$ {{ $order->total_price }}</td>
                            <td> {{ $order->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
