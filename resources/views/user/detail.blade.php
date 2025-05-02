@extends('layout.admin')

@section('content')
    <style>
        #product-description.collapsed {
            max-height: 300px;
            overflow: hidden;
            position: relative;
        }

        #toggle-description {
            padding: 0;
            font-weight: bold;
        }
    </style>

    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Hiển thị ảnh sản phẩm -->
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fixed" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <!-- Hiển thị thông tin sản phẩm -->
            <h3>{{ $product->name }}</h3>
            <p>Giá Sản Phẩm: {{ number_format($product->price) }} VND</p>
            <!-- <p>{{ $product->content }}</p> -->
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
        </div>
    </div>
</div>
 <!-- Comments Section -->

 <div class="container mt-4">
    <!-- Product Description and Comments Tabs -->
    <div id="product-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Mô tả sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Comment về sản phẩm</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div id="product-description" class="collapsed">
                            {!! nl2br(e($product->content)) !!}
                        </div>
                        <button id="toggle-description" class="btn btn-link mt-2">Xem thêm</button>
                    </div>
                </div>
            </div>


            <!-- Comments Tab -->
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Comment Form -->
                        <div class="col-md-6">
                            <div id="reviews">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Đánh giá sản phẩm</h3>
                                        <form action="{{ route('comments.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <div class="form-group">
                                                @if (Auth::check())
                                                    <label for="username">Tài khoản: {{ Auth::user()->name }}</label>

                                                    <div class="form-group" style="margin-top: 3%">
                                                        <label for="content">Nội dung bình luận:</label>
                                                        <textarea name="content" class="form-control" rows="4" style="max-width: 500px" placeholder="Nhập nội dung bình luận"></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px" name="submit-comment">Thêm Bình Luận</button>
                                                @else
                                                    <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để đánh giá.</p>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Existing Comments -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Các Đánh Giá Trước Đó</h5>
                                    <!-- Hiển thị các bình luận -->
                                    @if (isset($comments) && $comments->count() > 0)
                                        @foreach ($comments as $comment)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $comment->user->name }}</h6>
                                                    <p class="card-text">{{ $comment->comment }}</p>
                                                    <p class="card-text"><small class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</small></p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>Chưa có bình luận nào.</p>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Related Products -->
    <div class="container mt-4">
        <h2>Related Products</h2>
        <div class="container mt-4">
            <div class="row">
                @foreach($products as $relatedProduct)
                    @if($relatedProduct->id !== $product->id)
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}" class="card-img-top img-fixed" alt="{{ $relatedProduct->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                    <p class="card-text">${{ number_format($relatedProduct->price, 2) }}</p>
                                    <p>Category: {{ $relatedProduct->category_id }}</p>
                                    <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const desc = document.getElementById("product-description");
        const btn = document.getElementById("toggle-description");
        const quantityInput = document.getElementById("quantity");
        const minusBtn = document.getElementById("button-minus");
        const plusBtn = document.getElementById("button-plus");

        minusBtn.addEventListener("click", function () {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        plusBtn.addEventListener("click", function () {
            let value = parseInt(quantityInput.value);
            quantityInput.value = value + 1;
        });

        // Optional: Prevent non-numeric input
        quantityInput.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value === "" || parseInt(this.value) < 1) {
                this.value = 1;
            }
        });
        btn.addEventListener("click", function () {
            desc.classList.toggle("collapsed");
            if (desc.classList.contains("collapsed")) {
                btn.textContent = "Xem thêm";
            } else {
                btn.textContent = "Thu gọn";
            }
        });
    });
</script>
