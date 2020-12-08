@extends('templates.master')

@section('content')
<div class="container">
    <div class="my-5">
        @if ($orders->isNotEmpty())
        <div class="col d-flex justify-content-center">
            <h1>History</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Buyer Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Amount</th>

                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->buyer_contact }}</td>
                        <td>${{ number_format($order->amount,2,",",".") }}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="col d-flex justify-content-center">
            <h1>There's no data</h1>
        </div>
        <div class="col d-flex justify-content-center">
            <a href="{{ route('order.index') }}" class="btn btn-dark">Order Now</a>
        </div>
        @endif
    </div>
</div>

@endsection