<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('order_code')
                    ->label('Mã Đơn Hàng') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                TextColumn::make('grand_total')
                    ->label('Tổng Cộng') // Đổi nhãn sang tiếng Việt
                    ->money('VND'),
    
                TextColumn::make('status')
                    ->label('Trạng Thái') // Đổi nhãn sang tiếng Việt
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped'    => 'success',
                        'delivered' => 'success',
                        'canceled'  => 'danger'
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped'    => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'canceled'  => 'heroicon-m-x-circle'
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
    
                TextColumn::make('created_at')
                    ->label('Ngày Tạo Đơn') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
            ])
            ->filters([
                // Có thể thêm bộ lọc tại đây nếu cần
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('Xem đơn hàng') // Đổi nhãn sang tiếng Việt
                    ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                Tables\Actions\DeleteAction::make()
                    ->label('Xóa') // Đổi nhãn sang tiếng Việt
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa Nhiều') // Đổi nhãn sang tiếng Việt
                ]),
            ]);
    }
}
