<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Thêm Chart.js -->
    <style>
        .uk-navbar-container {
            background-color: #1e87f0;
            color: white;
        }
        .uk-navbar-nav > li > a {
            color: green;
        }
        .uk-offcanvas-bar {
            background-color: #1e87f0;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .uk-offcanvas-bar a {
            color: black;
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
            margin-top: 40px; /* Tạo khoảng cách giữa Dashboard và Footer */
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
        max-width: 1500px; /* Điều chỉnh giá trị này theo nhu cầu */
        
    }
    </style>
</head>
<body>
<div class="uk-offcanvas-content" >
     <!-- Navbar -->
     <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav-primary">
                <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
            </a>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li><a href="#">Profile</a></li>
                <li><a href="{{route('home')}}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Offcanvas -->
    <div id="offcanvas-nav-primary" uk-offcanvas="mode: push; overlay: true">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default uk-width-1-1">
                <li class="uk-active menu-item">
                    <a href="#">
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
                    <a href="#">
                        <span uk-icon="icon: list" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Category Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <span uk-icon="icon: credit-card" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Order Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <span uk-icon="icon: comments" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Comment Management</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <span uk-icon="icon: chart" ratio="1.5"></span>
                        <span class="uk-margin-small-left">Statistics</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <span uk-icon="icon: users" ratio="1.5"></span>
                        <span class="uk-margin-small-left">User Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="uk-container-expand ">
    @yield('content')
</div>


    
    <!-- Footer -->
    <footer class="footer">
        <div class="uk-container uk-text-center">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
            <p>
                <a href="#" class="uk-link-light">Privacy Policy</a> |
                <a href="#" class="uk-link-light">Terms of Service</a> |
                <a href="#" class="uk-link-light">Contact Us</a>
            </p>
        </div>
    </footer>
    <script>
    // Sales Overview Chart
    var ctx1 = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [10, 20, 30, 40, 50, 60],
                backgroundColor: 'rgba(30, 135, 240, 0.2)',
                borderColor: 'rgba(30, 135, 240, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // User Activity Chart
    var ctx2 = document.getElementById('activityChart').getContext('2d');
    var activityChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Activity',
                data: [5, 15, 25, 35],
                fill: false,
                borderColor: 'rgba(30, 135, 240, 1)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</div>

</body>
</html>
