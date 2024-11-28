<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemResource\Pages;
use App\Filament\Resources\OrderItemResource\RelationManagers;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Đơn hàng'; // Nhóm điều hướng
    public static function getPluralModelLabel(): string
    {
        return 'Chi tiết đơn hàng';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('product.images') // ID biến thể sản phẩm
                    ->label('Ảnh Sản Phẩm') // Thêm label
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.code') // ID biến thể sản phẩm
                    ->label('Mã Sản Phẩm') // Thêm label
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('order.order_code') // ID đơn hàng
                    ->label('Mã Đơn Hàng') // Thêm label
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity') // Số lượng
                    ->label('Số Lượng') // Thêm label
                    ->numeric()
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_amount') // Giá trị đơn vị
                    ->label('Giá Trị Đơn Vị') // Thêm label
                    ->numeric()
                    ->searchable()
                    ->money('VND')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount') // Tổng số tiền
                    ->label('Tổng Số Tiền') // Thêm label
                    ->numeric()
                    ->searchable()
                    ->money('VND')

                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at') // Thời gian tạo
                    ->label('Thời Gian Tạo') // Thêm label
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at') // Thời gian cập nhật
                    ->label('Thời Gian Cập Nhật') // Thêm label
                    ->dateTime()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter by Order Code
                // Tables\Filters\Filter::make('order')
                //     ->label('Lọc Theo Đơn Hàng')
                //     ->form([
                //         Forms\Components\TextInput::make('order_code')
                //             ->label('Mã Đơn Hàng')
                //             ->placeholder('Nhập mã đơn hàng'),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         return $query->whereHas('order', function (Builder $query) use ($data) {
                //             $query->where('order_code', $data['order_code']);
                //         });
                //     }),

                // Filter by Product Variant SKU
                // Tables\Filters\Filter::make('product_variant')
                //     ->label('Lọc Theo Biến Thể Sản Phẩm')
                //     ->form([
                //         Forms\Components\TextInput::make('sku')
                //             ->label('Mã Biến Thể')
                //             ->placeholder('Nhập mã biến thể'),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         return $query->whereHas('product_variant', function (Builder $query) use ($data) {
                //             $query->where('sku', $data['sku']);
                //         });
                //     }),

                // Filter by Quantity
                // Tables\Filters\Filter::make('quantity')
                //     ->label('Lọc Theo Số Lượng')
                //     ->form([
                //         Forms\Components\TextInput::make('quantity')
                //             ->label('Số Lượng')
                //             ->numeric(),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         return $query->where('quantity', '>=', $data['quantity']);
                //     }),

                // Filter by Date Range

            ])
            ->actions([
                // View Order Action
                Tables\Actions\Action::make('view_order')
                ->label('Xem Đơn Hàng')
                ->url(fn ($record) => \App\Filament\Resources\OrderResource::getUrl('edit', ['record' => $record->order_id]))
                ->icon('heroicon-o-eye')
                ->openUrlInNewTab(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa Hàng Loạt'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make() // Hành động xóa hàng loạt
                        ->label('Xóa Hàng Loạt'), // Thêm label cho hành động
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }
}
