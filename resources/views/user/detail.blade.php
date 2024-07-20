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
                <p>Giá Sản Phẩm: {{ number_format($product->price) }} VND</p>
                <p>{{ $product->content }}</p>
                <p>Category: {{ $product->category_name }}</p>

                <!-- Nhóm số lượng và nút Add to Cart -->
                @if (Auth::check())
                <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <!-- Input số lượng sản phẩm -->
                    <div class="input-group mr-3" style="width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="button-minus">-</button>
                        </div>
                        <input type="text" class="form-control text-center" id="quantity" name="quantity" value="1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-plus">+</button>
                        </div>
                    </div>

                    <!-- Nút Add to Cart -->
                    <button type="submit" class="btn btn-primary" onclick="return confirmCart()">Add to Cart</button>
                </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-success">Login When you Want Add to Cart</a>
            @endif
                </form>
            </div>
        </div>
    </div>


    <!-- Related Products -->
    <div class="container mt-4">
        <h2>Related Products</h2>
        <div class="container mt-4">
            <div class="row">
                @foreach($products as $relatedProduct)
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset($relatedProduct->image) }}" class="card-img-top img-fixed" alt="{{ $relatedProduct->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                <p class="card-text">${{ number_format($relatedProduct->price, 2) }}</p>
                                <p>Category: {{ $relatedProduct->category_id }}</p>
                                <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection
