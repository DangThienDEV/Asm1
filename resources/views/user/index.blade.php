@extends('layout.admin')

@section('content')

    @if($banners->count())
        <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($banners as $index => $banner)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($banners as $index => $banner)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                @auth
                                    Welcome to Computer: {{ $user->name }}!
                                @else
                                    Welcome to Computer!
                                @endauth
                            </h5>
                            <p>{{ $banner->title }}</p>
                            @if ($banner->link)
                                <a class="btn btn-primary btn-lg" href="{{ $banner->link }}" role="button">Shop Now</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    <!-- Search & Category Filter -->
    <div class="container mt-4">
        <h2>Search Products</h2>
        <form action="{{ route('home') }}" method="GET">
            <div class="row align-items-center">
                <div class="col-md-3 mb-2">
                    <input type="text" name="keyword" class="form-control" placeholder="Search products..." value="{{ request('keyword') }}">
                </div>
                <div class="col-md-3 mb-2">
                    <select name="category_id" class="form-control select2">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Search Summary -->
    <div class="container mt-2">
        @if(request('keyword') || request('category_id'))
            <div class="alert alert-info">
                <strong>Bạn đang lọc theo:</strong>
                @if(request('keyword'))
                    Từ khóa: <em>{{ request('keyword') }}</em>
                @endif
                @if(request('category_id'))
                    @php
                        $selectedCategory = $categories->firstWhere('id', request('category_id'));
                    @endphp
                    | Danh mục: <em>{{ $selectedCategory ? $selectedCategory->name : 'Không xác định' }}</em>
                @endif
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary float-end">Xoá lọc</a>
            </div>
        @endif
    </div>

    <!-- Featured Products -->
    <div class="container mt-4">
        <h2 class="col-lg-8 col-md-4 mb-4">The Products You Are Looking For </h2>
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ number_format($product->price, 2) }} VND</p>
                            </div>
                            <div>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">Không tìm thấy sản phẩm phù hợp.</div>
                </div>
            @endforelse
        </div>
    </div>

<!-- Trending Products -->
<div class="container mt-4">
    <h2>Trending Products</h2>
    <div class="row">
        @foreach($trendingProducts as $product)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ number_format($product->price) }} VND</p>
                            <p>Category: {{ $product->category_name }}</p>
                        </div>
                        <div>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-block" data-toggle="modal" data-target="#productModal{{ $product->id }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Modal -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                            <p class="mt-3">{{ number_format($product->price) }} VND</p>
                            <p>Category: {{ $product->category_name }}</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

