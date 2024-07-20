@extends('layout.admin')

@section('content')
   
    <!-- Banner -->
    <div class="container mt-4">
        <div class="jumbotron p-5 bg-light rounded-3">
        <h1 class="display-4" >
                @auth
                    Welcome to Computer: {{ $user->name }}!
                @else
                    Welcome to Computer!
                @endauth
            </h1>
            <p class="lead">Find the best products at unbeatable prices.</p>
            <hr class="my-4">
            <p>Explore our wide range of products and enjoy great discounts.</p>
            <a class="btn btn-primary btn-lg" href="{{route('product.search')}}" role="button">Shop Now</a>
        </div>
    </div>

    <!-- Categories -->
    <div class="container mt-4">
        <h2>Categories</h2>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('category.show', ['id' => $category->id]) }}" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

  <!-- Featured Products -->
<div class="container mt-4">
    <h2>Featured Products</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ number_format($product->price, 2) }} VND</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<h2>Trending Products</h2>
    <div class="row">
        @foreach($trendingProducts as $product)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ number_format($product->price) }}VND</p>
                        <p>Category: {{ $product->category_name }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
