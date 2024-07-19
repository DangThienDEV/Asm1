@extends('layout.admin')

@section('content')

<div class="container mt-4">
<div class="row">
            <div class="col-md-6">
                <!-- Hiển thị ảnh sản phẩm -->
                <img src="{{ asset($product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <!-- Hiển thị thông tin sản phẩm -->
                <h3>{{ $product->name }}</h3>
                <p>Giá Sản Phẩm: ${{ number_format($product->price, 2) }}</p>
                <p>{{ $product->content }}</p>
                <p>Category: {{ $product->category_name }}</p>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="container mt-4">
        <h2>Related Products</h2>
        <div class="container mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <p>Category: {{ $product->category_id }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
        </div>
    </div>
@endsection