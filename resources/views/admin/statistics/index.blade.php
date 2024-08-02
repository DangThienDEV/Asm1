@extends('layout.add')

@section('content')
<div class="uk-container uk-margin-top">
    <h1 class="uk-heading-line"><span>Thống Kê</span></h1>
    
    <div class="uk-grid-match uk-child-width-1-4@m" uk-grid>
        <!-- Ô 1: Số lượng đăng ký mới -->
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Số lượng đăng ký mới</h3>
                <p><strong>{{ $new_registrations }}</strong></p>
            </div>
        </div>

        <!-- Ô 2: Số lượng sản phẩm -->
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Số lượng sản phẩm</h3>
                <p><strong>{{ $total_products }}</strong></p>
            </div>
        </div>

        <!-- Ô 3: Số lượng sản phẩm đã bán ra -->
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Số lượng sản phẩm đã bán ra</h3>
                <p><strong>{{ $total_sold_products }}</strong></p>
            </div>
        </div>

        <!-- Ô 4: Doanh thu tổng -->
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Doanh thu tổng</h3>
                <p><strong>{{ $total_revenue }}VND</strong></p>
            </div>
        </div>
    </div>
        
        <div class="uk-width-1-1">
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Doanh thu theo ngày</h3>
                <canvas id="revenueChart" width="600" height="300"></canvas>
            </div>
        </div>

        <div class="uk-width-1-1">
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Số lượng đăng ký mới theo ngày</h3>
                <canvas id="newRegistrationsChart" width="600" height="300"></canvas>
            </div>
        </div>
        
        <div class="uk-width-1-1">
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Số lượng sản phẩm đã bán ra theo ngày</h3>
                <canvas id="soldProductsChart" width="600" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dữ liệu doanh thu theo ngày từ Laravel
            const revenueData = @json($revenue_by_date);
            const newRegistrationsData = @json($new_registrations_by_date);
            const soldProductsData = @json($sold_products_by_date);

            const revenueLabels = Object.keys(revenueData);
            const revenueValues = Object.values(revenueData);

            const newRegistrationsLabels = Object.keys(newRegistrationsData);
            const newRegistrationsValues = Object.values(newRegistrationsData);

            const soldProductsLabels = Object.keys(soldProductsData);
            const soldProductsValues = Object.values(soldProductsData);

            // Biểu đồ doanh thu theo ngày
            const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctxRevenue, {
                type: 'line',
                data: {
                    labels: revenueLabels,
                    datasets: [{
                        label: 'Doanh thu theo ngày',
                        data: revenueValues,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
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

            // Biểu đồ số lượng đăng ký mới theo ngày
            const ctxNewRegistrations = document.getElementById('newRegistrationsChart').getContext('2d');
            new Chart(ctxNewRegistrations, {
                type: 'bar',
                data: {
                    labels: newRegistrationsLabels,
                    datasets: [{
                        label: 'Số lượng đăng ký mới theo ngày',
                        data: newRegistrationsValues,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
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

            // Biểu đồ số lượng sản phẩm đã bán ra theo ngày
            const ctxSoldProducts = document.getElementById('soldProductsChart').getContext('2d');
            new Chart(ctxSoldProducts, {
                type: 'bar',
                data: {
                    labels: soldProductsLabels,
                    datasets: [{
                        label: 'Số lượng sản phẩm đã bán ra theo ngày',
                        data: soldProductsValues,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
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
        });
    </script>
@endsection