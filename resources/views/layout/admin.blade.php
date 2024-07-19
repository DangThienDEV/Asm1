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
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
               

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart (0)</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        @else
                            <!-- Thêm bất kỳ nội dung nào bạn muốn hiển thị khi chưa đăng nhập -->
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
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Văn Mạc Computer</h5>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-dark">Contact Us</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Support</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Terms of Service</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-light">
            © 2024 Shop Name
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
