@extends('templates.master')
@section('content')
<div class="container">
    <div class="my-5">
        <div class="col d-flex justify-content-center">
            <h1>Input Product</h1>
        </div>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="form-group">
                <label for="name">Product Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Product name" required>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="price">$ USD</span>
                    </div>
                    <input name="price" type="number" class="form-control" placeholder="Product price" aria-label="Product price"
                        aria-describedby="price" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input name="stock" type="number" class="form-control" id="stock" placeholder="Product stock" required>
            </div>
            <div class="form-group">
                <label for="file">File Input</label>
                <input name="file" type="file" class="form-control-file" id="file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection