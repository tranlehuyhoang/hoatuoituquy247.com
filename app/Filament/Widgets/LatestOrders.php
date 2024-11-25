<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
   
    protected static ?string $heading = 'Đơn Hàng Mới Nhất'; // Tiêu đề tiếng Việt
    protected int | string | array  $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                TextColumn::make('order_code')
                    ->label('Mã Đơn Hàng') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
                    TextColumn::make('address.phone')
                    ->label('Số Điện Thoại')
                    ->searchable(),
                
                TextColumn::make('user.name')
                    ->label('Khách Hàng') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                TextColumn::make('grand_total')
                    ->label('Tổng Tiền') // Đổi nhãn sang tiếng Việt
                    ->money('VND'),
                TextColumn::make('profit_loss')
                    ->label('Lợi nhuận') // Đổi nhãn sang tiếng Việt
                    ->money('VND'),
    
                TextColumn::make('status')
                    ->label('Trạng Thái') // Đổi nhãn sang tiếng Việt
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped' => 'success',
                        'delivered' => 'success',
                        'canceled' => 'danger'
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'canceled' => 'heroicon-m-x-circle'
                    })
                    ->sortable(),
    
                TextColumn::make('payment_method')
                    ->label('Phương Thức Thanh Toán') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->searchable(),
    
                TextColumn::make('payment_status')
                    ->label('Trạng Thái Thanh Toán') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->searchable()
                    ->badge(),
    
                    TextColumn::make('shipping_method')
                    ->label('Phương Thức Vận Chuyển')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'in_store_pickup' => 'Nhận tại cửa hàng',
                        'home_delivery' => 'Giao hàng tận nơi',
                        default => 'Chưa xác định',
                    }),

    
                TextColumn::make('shipping_amount') // Thêm tiền vận chuyển
                    ->label('Phí Vận Chuyển') // Nhãn tiếng Việt
                    ->money('VND'),
    
                TextColumn::make('created_at')
                    ->label('Ngày Đặt Hàng') // Đổi nhãn sang tiếng Việt
                    ->dateTime('d/m/Y H:i:s') // Định dạng ngày giờ (ngày/tháng/năm giờ:phút:giây)
                    ->formatStateUsing(fn ($state) => $state->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s')) // Chuyển đổi sang múi giờ Việt Nam
            ])
            ->actions([
                Action::make('view Order')
                    ->label('Xem Đơn Hàng') // Đổi nhãn sang tiếng Việt
                    ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye')
            ]);
    }
}
