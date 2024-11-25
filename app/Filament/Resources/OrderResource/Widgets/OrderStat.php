<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Đơn Hàng Mới', Order::query()->where('status', 'new')->count()), // Đổi nhãn sang tiếng Việt
            Stat::make('Đơn Hàng Đang Xử Lý', Order::query()->where('status', 'processing')->count()), // Đổi nhãn sang tiếng Việt
            Stat::make('Đơn Hàng Đã Gửi', Order::query()->where('status', 'shipped')->count()), // Đổi nhãn sang tiếng Việt
            Stat::make('Giá Trị Trung Bình', Number::currency(Order::query()->avg('grand_total') ?? 0, 'VND')), // Đổi nhãn sang tiếng Việt
        ];
    }
}
