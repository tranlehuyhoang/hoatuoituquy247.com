<?php

namespace App\Filament\Widgets;

use App\Models\Order; // Giả sử bạn có mô hình Order
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class OrderStatistics extends ChartWidget
{
    protected static ?string $heading = 'Thống Kê Đơn Hàng Theo Tháng';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Lấy dữ liệu cho biểu đồ
        $currentYear = Carbon::now()->year; // Sử dụng năm hiện tại
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count, SUM(grand_total) as total_grand, SUM(profit_loss) as total_profit')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Khởi tạo dữ liệu cho biểu đồ
        $months = range(1, 12);
        $orderCounts = array_fill(0, 12, 0);
        $totalGrands = array_fill(0, 12, 0);
        $totalProfits = array_fill(0, 12, 0);

        foreach ($orders as $order) {
            $orderCounts[$order->month - 1] = $order->order_count; // Lưu số đơn hàng
            $totalGrands[$order->month - 1] = $order->total_grand; // Lưu tổng tiền
            $totalProfits[$order->month - 1] = $order->total_profit; // Lưu lợi nhuận
        }

        return [
            'datasets' => [
                [
                    'label' => 'Số Đơn Hàng',
                    'data' => $orderCounts,
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
                [
                    'label' => 'Tổng Tiền (Grand Total)',
                    'data' => $totalGrands,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
                [
                    'label' => 'Lợi Nhuận (Profit/Loss)',
                    'data' => $totalProfits,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
            ],
            'labels' => array_map(function ($month) {
                return $this->getVietnameseMonthName($month); // Lấy tên tháng bằng tiếng Việt
            }, $months),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getVietnameseMonthName($month): string
    {
        $months = [
            1 => 'Tháng 1',
            2 => 'Tháng 2',
            3 => 'Tháng 3',
            4 => 'Tháng 4',
            5 => 'Tháng 5',
            6 => 'Tháng 6',
            7 => 'Tháng 7',
            8 => 'Tháng 8',
            9 => 'Tháng 9',
            10 => 'Tháng 10',
            11 => 'Tháng 11',
            12 => 'Tháng 12',
        ];

        return $months[$month] ?? 'Tháng';
    }
}