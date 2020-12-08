@extends('templates.master')

@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i> {{ session()->get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="block">
        <div class="block-content">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if ($products->isNotEmpty())
    <div class="row my-5">
        <div class="card-deck">

            @foreach ($products as $product)
            <div class="col-md-4 mb-5">
                <div class="card  h-100">
                    <img class="card-img-top" src="{{ Storage::url($product->img_path) }}" alt="Product image" height="200" style="object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <h4>${{ number_format($product->price,2,",",".") }}</h4>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('order.create') }}?product_id={{ $product->id }}"
                            class="btn btn-success">Order Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else

    <div class="my-5">
        <div class="col d-flex justify-content-center">
            <h1>There's no data</h1>
        </div>
        <div class="col d-flex justify-content-center">
            <a href="{{ route('product.create') }}" class="btn btn-dark">Add Product</a>
        </div>
    </div>
    @endif

</div>
@endsection