@extends('layout.apps')
@if (session()->has('message'))
<div class="alert alert-success">
     {{session()->get ('message')}}
</div>
@endif
@section('main')

<div class="d-flex justify-content-between">
    <h5><i class="bi bi-journal-richtext"></i> Product Details</h5>
    <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Product</a>
</div>
<div class="col-md-12 table-responsive mt-3">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>INR</th>
                <th>Selling Price</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('product/' . $product->image) }}" style="width: 50px; height: 50px; object-fit: contain" alt="Product">
                </td>
                <!-- <td><a href="product/{{$product->id}}/show">{{ $product->name }}</a></td> -->
                <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>

                <td>Rs.{{ $product->mrp }}</td>
                <td>Rs.{{ $product->price }}</td>
                <td>
                    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                     
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
</div>
@endsection
