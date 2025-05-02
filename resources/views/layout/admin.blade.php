<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
        .img-fixed {
            height: 400px; /* Đặt chiều cao cố định cho hình ảnh */
            object-fit: cover; /* Cắt hình ảnh để giữ tỷ lệ */
            width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng của thẻ card */
        }
        .carousel-item img {
            height: 500px; /* Adjust the height as needed */
            object-fit: cover;
            width: 100%;
        }
        .category-card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        .img-fixed {
            height: 400px;
            object-fit: cover;
        }


    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Computer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.search')}}">Products</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.search')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                        <a class="nav-link" href="{{route('history.index')}}">Đơn Hàng</a>
                        @else
                        <a class="nav-link" href="{{route('login')}}"  onclick="return confirmLogin()">Đơn Hàng</a>

                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                        <a class="nav-link" href="{{ route('detailUsers', Auth::user()->id) }}">Chi tiết tài khoản</a>
                        @else
                        <a class="nav-link" href="{{route('login')}}"  onclick="return confirmLogin()">Chi tiết tài khoản</a>

                        @endif
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        @if(Auth::check() && Auth::user()->role == 1)
                            <!-- Nếu người dùng là admin, hiển thị liên kết đến trang admin -->
                            <a class="nav-link" href="{{route('admin') }}">Quản Lý Admin</a>
                        @endif
                    </li>


                </ul>
               <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="{{route('cart.index') }}">Cart <i class="fa-solid fa-cart-shopping"></i></a>
                    @else
                        <a class="nav-link" href="{{route('login')}}"  onclick="return confirmLogin()">Cart <i class="fa-solid fa-cart-shopping"></i></a>
                    @endif
                </li>

                    <li class="nav-item">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        @else
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')

    </div>


    <footer class="bg-light text-center text-lg-start mt-4">
    <div class="container p-4">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase font-weight-bold">Văn Mạc Computer</h5>
                <p>
                    We offer the best products at unbeatable prices. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
            </div>
            <!-- Contact Section -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase font-weight-bold">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#!" class="text-dark">Contact Us</a>
                    </li>
                    <li class="mb-2">
                        <a href="#!" class="text-dark">Support</a>
                    </li>
                    <li class="mb-2">
                        <a href="#!" class="text-dark">Privacy Policy</a>
                    </li>
                    <li class="mb-2">
                        <a href="#!" class="text-dark">Terms of Service</a>
                    </li>
                </ul>
            </div>
            <!-- Social Media Section -->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase font-weight-bold">Follow Us</h5>
                <ul class="list-unstyled d-flex justify-content-center">
                    <li class="me-3">
                        <a href="#!" class="text-dark">
                            <i class="fab fa-facebook-f fa-2x"></i>
                        </a>
                    </li>
                    <li class="me-3">
                        <a href="#!" class="text-dark">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </li>
                    <li class="me-3">
                        <a href="#!" class="text-dark">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-light">
        © 2024 Văn Mạc Computer
    </div>
</footer>
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   <script>
    document.querySelectorAll('form[action*="/cart/remove"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!confirm('Are you sure you want to remove this item?')) {
                event.preventDefault();
            }
        });
    });


    // Đối tượng xác nhận để quản lý các thông báo
    const confirmation = {
        login: 'Bạn Cần Đăng NHập Để Xem. Bạn Có Muốn Đăng Nhập Ngay KHông ?',
        addToCart: 'Thêm vào giỏ hàng thành công',
        updateCart: 'Cap nhap thanh cong',
        order: 'Dat hang thanh cong',
        removeItem: 'Are you sure you want to remove this item from your cart?'
    };

    // Hàm xác nhận
    function confirmLogin() {
        return confirm(confirmation.login);
    }

    function confirmCart() {
        return confirm(confirmation.addToCart);
    }

    function confirmCartUpdate() {
        return confirm(confirmation.updateCart);
    }

    function confirmOrder() {
        return confirm(confirmation.order);
    }
    function confirmLoginSuccess() {
        return confirm(confirmation.LoginSuccess);
    }
    </script>

</body>
</html>
