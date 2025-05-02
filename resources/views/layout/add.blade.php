<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .uk-navbar-container {
            background-color: #1e87f0;
            color: white;
        }
        .uk-navbar-nav > li > a {
            color: white;
        }
        .uk-offcanvas-bar {
            background-color: #1e87f0;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .uk-offcanvas-bar a {
            color: white;
        }
        .uk-card-title {
            color: #1e87f0;
        }
        .menu-item {
            margin: 15px 0;
        }
        .footer {
            background-color: #1e87f0;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
        .uk-card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .uk-grid-item-match {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .custom-container {
            max-width: 1800px;
        }
        .btn-active {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn-inactive {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="uk-offcanvas-content">
    <!-- Navbar -->
    <nav class="uk-navbar-container">
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav-primary">
                <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
            </a>
            <ul class="uk-navbar-nav">
                <li><a style="color: #1e87f0" href="#">Profile</a></li>
                <li><a style="color: #1e87f0" href="{{route('home')}}">Logout</a></li>
            </ul>
        </div>
        <div class="uk-navbar-right">

        </div>
    </nav>

    <!-- Offcanvas -->
    <div id="offcanvas-nav-primary" uk-offcanvas="mode: push; overlay: true">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default uk-width-1-1">
                <li class="uk-active menu-item">
                    <a href="{{route('admin')}}">
                        <span uk-icon="icon: home" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('products.index')}}">
                        <span uk-icon="icon: cart" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Product Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('categories.index')}}">
                        <span uk-icon="icon: list" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Category Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('orders.index')}}">
                        <span uk-icon="icon: credit-card" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Order Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('banners.index')}}">
                        <span uk-icon="icon: comments" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Banners Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('statistics.index') }}">
                        <span uk-icon="icon: chart" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Statistics</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('users.index')}}">
                        <span uk-icon="icon: users" ratio="1.5"></span>
                        <span class="uk-margin-small-left">User Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="uk-container-expand custom-container">
    @yield('content')
</div>

<!-- Footer -->
<footer class="footer">
    <div class="uk-container uk-text-center">
        <p>&copy; 2024 Văn Mạc Computer. All rights reserved.</p>
        <p >
            <a style="color: #ffffff !important;" href="#" class="uk-link-light">Privacy Policy</a> |
            <a style="color: #ffffff !important;" href="#" class="uk-link-light">Terms of Service</a> |
            <a style="color: #ffffff !important;" href="#" class="uk-link-light">Contact Us</a>
        </p>
    </div>
</footer>
@yield('scripts')
</body>
</html>
