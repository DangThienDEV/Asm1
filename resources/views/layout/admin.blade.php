<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
               

                <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="{{ route('cart.index') }}">Cart <i class="fa-solid fa-cart-shopping"></i></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            $(document).ready(function() {
        // Xử lý tăng số lượng
        $('.increase-quantity').click(function() {
            let row = $(this).closest('tr');
            let input = row.find('.quantity-input');
            let currentQuantity = parseInt(input.val());
            input.val(currentQuantity + 1).trigger('change');
        });

        // Xử lý giảm số lượng
        $('.decrease-quantity').click(function() {
            let row = $(this).closest('tr');
            let input = row.find('.quantity-input');
            let currentQuantity = parseInt(input.val());
            if (currentQuantity > 1) {
                input.val(currentQuantity - 1).trigger('change');
            }
        });

        // Xử lý thay đổi số lượng
        $('.quantity-input').on('change', function() {
            let row = $(this).closest('tr');
            let itemId = row.data('item-id');
            let quantity = $(this).val();

            $.ajax({
                url: '{{ route('cart.updateQuantity', '') }}/' + itemId,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        row.find('.total-price').text('$' + response.total);
                        $('#cart-total').text('$' + response.cartTotal);
                    }
                }
            });
        });

        // Xử lý nút "Update Cart"
        $('#update-cart-btn').click(function() {
            let form = $('#cart-form');
            $.ajax({
                url: form.attr('action'),
                type: 'PUT',
                data: form.serialize(),
                success: function(response) {
                    alert('Cart updated successfully!');
                },
                error: function() {
                    alert('An error occurred while updating the cart.');
                }
            });
        });

        // Xử lý xác nhận khi xóa sản phẩm
        document.querySelectorAll('form[action*="/cart/remove"]').forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!confirm(confirmation.removeItem)) {
                    event.preventDefault();
                }
            });
        });
    });

    // Đối tượng xác nhận để quản lý các thông báo
    const confirmation = {
        login: 'You need to log in to view your cart. Do you want to log in now?',
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
