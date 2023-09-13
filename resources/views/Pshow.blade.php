@extends('layout.apps')
@section('main')
        <h5> <i class="bi bi-plus-square-fill"></i>About Product</h5>
        <hr />
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Home</a></li>
                <li class="breadcrumb-item active">About Product</li>
            </ol>
        </nav>
       <div class="card" style ="max-width=30rem; flex-direction:row; border:0; ">
               <img src="{{ url('product/' . $product->image) }}" alt="Product" class="card-img-top" style="max-width:35%; margin:auto; padding:0.5em; border-radius:0.7em;">
            <div class="card-body">
               <h5 class="card-title">{{$product->name}}</h5>
               <p class="card-text">{{$product->description}}</p>
            <p class="fw-bold">M.R.P <small class="text-danger text-decoration-line-through">Rs.{{$product->mrp}}</small></p>
            <p class="fw-bold">Selling Price <small class="text-success">Rs.{{$product->price}}</small></p>
            </div>
        </div>
@endsection