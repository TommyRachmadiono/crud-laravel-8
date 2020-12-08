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
    <div class="col d-flex justify-content-center mt-5">
        <h1>List Product</h1>
    </div>

    <a href="{{ route('product.create') }}" class="btn btn-dark">Add Product</a>

    <div class="table-responsive my-3">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price,2,",",".") }}</td>
                    <td>
                        <div class="btn-toolbar">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('product.edit', [$product->id]) }}"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="{{ route('product.destroy', [$product->id]) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-times-circle"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
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