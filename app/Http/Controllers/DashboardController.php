<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu thống kê
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray(); // Chuyển dữ liệu thành mảng để dễ xử lý trong JavaScript

        $activityData = Order::selectRaw('WEEK(created_at) as week, COUNT(*) as count')
            ->groupBy('week')
            ->pluck('count', 'week')
            ->toArray(); // Chuyển dữ liệu thành mảng để dễ xử lý trong JavaScript

            dd($salesData, $activityData);
            return view('admin.index', [
                'salesData' => $salesData,
                'activityData' => $activityData,
            ]);
    }
}

