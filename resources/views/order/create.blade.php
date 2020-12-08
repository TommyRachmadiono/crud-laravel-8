@extends('templates.master')
@section('content')
<div class="container">
    <div class="my-5">
        @if(session()->has('error'))
        <div class="alert alert-danger">
            <i class="fa fa-check"></i> {{ session()->get('error') }}
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">
            <i class="fa fa-check"></i> {{ session()->get('success') }}
        </div>
        @endif
        <div class="col d-flex justify-content-center">
            <h1>Order</h1>
        </div>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ Storage::url($product->img_path) }}" alt="" width="100%" height="100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-muted">Stock : {{ $product->stock }}</small></p>
                        <h4>${{ number_format($product->price,2,",",".") }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white px-5 py-5">
            <div class="col d-flex justify-content-center">
                <h1>Buyer Information</h1>
            </div>
            <form action="{{ route('order.store') }}" method="POST">
                {{ @csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="buyer_name" type="text" class="form-control" id="buyer_name" placeholder="Name"
                        required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input name="buyer_contact" type="text" class="form-control" id="buyer_contact"
                        placeholder="Contact" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Quantity"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>
@endsection