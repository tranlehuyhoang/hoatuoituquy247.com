<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStat;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            OrderStat::class
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make('Tất Cả'), // Đổi tiêu đề sang tiếng Việt
            'new' => Tab::make('Mới')->query(fn($query) => $query->where('status', 'new')),
            'processing' => Tab::make('Đang Xử Lý')->query(fn($query) => $query->where('status', 'processing')),
            'shipped' => Tab::make('Đã Gửi')->query(fn($query) => $query->where('status', 'shipped')),
            'delivered' => Tab::make('Đã Giao')->query(fn($query) => $query->where('status', 'delivered')), // Sửa lỗi chính tả từ 'delieverd'
        ];
    }
}
