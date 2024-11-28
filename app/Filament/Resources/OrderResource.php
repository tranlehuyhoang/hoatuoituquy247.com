<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

use function Laravel\Prompts\select;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Đơn hàng'; // Nhóm điều hướng
    protected static ?string $recordTitleAttribute = 'name'; // Thuộc tính tiêu đề của bản ghi

    public static function getPluralModelLabel(): string
    {
        return 'Đơn hàng';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Thông Tin Đơn Hàng') // Tiêu đề section
                        ->schema([
                            Select::make('user_id')
                                ->label('Khách Hàng') // Đổi nhãn sang tiếng Việt
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('payment_method')
                                ->label('Phương Thức Thanh Toán') // Đổi nhãn sang tiếng Việt
                                ->options([
                                    'cod' => '(COD)',
                                    'bank' => 'Ngân hàng',
                                    'appotabank' => 'AppotaBank',
                                ])
                                ->required(),

                            Select::make('payment_status')
                                ->label('Trạng Thái Thanh Toán') // Đổi nhãn sang tiếng Việt
                                ->options([
                                    'pending' => 'Đang Chờ',
                                    'paid'    => 'Đã Thanh Toán',
                                    'failed'  => 'Thất Bại'
                                ])
                                ->default('pending')
                                ->required(),

                            // Thêm Shipping Method và Shipping Amount ở đây
                            Select::make('shipping_method')
                                ->label('Phương Thức Vận Chuyển') // Đổi nhãn sang tiếng Việt
                                ->options([
                                    'in_store_pickup' => 'Nhận tại cửa hàng',
                                    'home_delivery' => 'Giao hàng tận nơi',
                                ])
                                ->required()
                                ->reactive(),

                            TextInput::make('shipping_amount')
                                ->label('Phí Vận Chuyển') // Đổi nhãn sang tiếng Việt
                                ->numeric() // Chuyển thành input dạng số
                                ->required()
                                ->default(0),

                            TextInput::make('grand_total')
                                ->label('Tổng Cộng') // Đổi nhãn sang tiếng Việt
                                ->numeric() // Chuyển thành input dạng số
                                ->required()
                                ->default(0),


                            ToggleButtons::make('status')
                                ->inline()
                                ->default('new')
                                ->required()
                                ->label('Trạng Thái Đơn Hàng') // Đổi nhãn sang tiếng Việt
                                ->options([
                                    'new' => 'Mới',
                                    'processing' => 'Đang Xử Lý',
                                    'shipped'    => 'Đã Gửi',
                                    'delivered' => 'Đã Giao',
                                    'cancelled'  => 'Đã Hủy'
                                ])
                                ->colors([
                                    'new' => 'info',
                                    'processing' => 'warning',
                                    'shipped'    => 'success',
                                    'delivered' => 'success',
                                    'cancelled'  => 'danger'
                                ])->icons([
                                    'new' => 'heroicon-m-sparkles',
                                    'processing' => 'heroicon-m-arrow-path',
                                    'shipped'    => 'heroicon-m-truck',
                                    'delivered' => 'heroicon-m-check-badge',
                                    'cancelled'  => 'heroicon-m-x-circle'
                                ]),



                            Textarea::make('notes')
                                ->label('Ghi Chú') // Đổi nhãn sang tiếng Việt
                                ->columnSpanFull()
                        ])->columns(2),

                    Section::make('Sản Phẩm Đơn Hàng') // Tiêu đề section
                        ->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->schema([
                                    Select::make('product_id')
                                        ->label('Sản Phẩm') // Đổi nhãn sang tiếng Việt
                                        ->relationship('product', 'name')
                                        ->preload()
                                        ->required()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->reactive()
                                        ->afterStateUpdated(fn($state, Set $set) => $set('unit_amount', ProductVariant::find($state)?->discount_price ?? 0))
                                        ->afterStateUpdated(fn($state, Set $set) => $set('total_amount', ProductVariant::find($state)?->discount_price ?? 0))
                                        ->columnSpan(4),

                                    TextInput::make('quantity')
                                        ->label('Số Lượng') // Đổi nhãn sang tiếng Việt
                                        ->numeric()
                                        ->required()
                                        ->default(1)
                                        ->minValue(1)
                                        ->columnSpan(2)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                            // Cập nhật tổng giá
                                            $unitAmount = $get('unit_amount');
                                            $set('total_amount', $state * $unitAmount);
                                        }),
                                    TextInput::make('unit_amount')
                                        ->label('Đơn Giá') // Đổi nhãn sang tiếng Việt
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(3),

                                    TextInput::make('total_amount')
                                        ->label('Tổng Giá') // Đổi nhãn sang tiếng Việt
                                        ->numeric()
                                        ->required()
                                        ->dehydrated()
                                        ->columnSpan(3)
                                ])->columns(12),

                            Placeholder::make('grand_total_placeholder')
                                ->label('Tổng Cộng') // Đổi nhãn sang tiếng Việt
                                ->content(function (Get $get, Set $set) {
                                    $total = 0;
                                    if (!$repeaters = $get('items')) {
                                        return $total;
                                    }

                                    foreach ($repeaters as $key => $repeater) {
                                        $total += $get("items.{$key}.total_amount") ?? 0; // Cộng dồn tổng giá
                                    }
                                    $set('grand_total', $total + ($get('shipping_amount') ?? 0));
                                    return Number::currency($total + ($get('shipping_amount') ?? 0), "VND");
                                }),

                            Hidden::make('grand_total')
                                ->default(0)
                        ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_code')
                    ->label('Mã Đơn Hàng') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('address.phone')
                    ->label('Số Điện Thoại')
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Khách Hàng') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->label('Tổng Cộng') // Đổi nhãn sang tiếng Việt
                    ->numeric()
                    ->sortable()
                    ->money('VND'),


                TextColumn::make('payment_method')
                    ->label('Phương Thức Thanh Toán') // Đổi nhãn sang tiếng Việt
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'cod' => 'Giao hàng và thu tiền tại nhà (COD)',
                        'bank' => 'Ngân hàng',

                        default => 'Chưa xác định', // Xử lý trường hợp không hợp lệ
                    }),

                TextColumn::make('payment_status')
                    ->label('Trạng Thái Thanh Toán') // Đổi nhãn sang tiếng Việt
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('status')
                    ->label('Trạng Thái Đơn Hàng') // Đổi nhãn sang tiếng Việt
                    ->options([
                        'new' => 'Mới', // Đổi giá trị sang tiếng Việt
                        'processing' => 'Đang Xử Lý', // Đổi giá trị sang tiếng Việt
                        'shipped'    => 'Đã Gửi', // Đổi giá trị sang tiếng Việt
                        'delivered' => 'Đã Giao', // Đổi giá trị sang tiếng Việt
                        'cancelled'  => 'Đã Hủy' // Đổi giá trị sang tiếng Việt
                    ])
                    ->searchable()
                    ->sortable(),


                TextColumn::make('shipping_amount')
                    ->label('Phí Vận Chuyển') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->money('VND'),

                TextColumn::make('created_at')
                    ->label('Ngày Đặt Hàng') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ,

                TextColumn::make('updated_at')
                    ->label('Ngày Cập Nhật') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                // Có thể thêm bộ lọc tại đây nếu cần
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'), // Đổi nhãn sang tiếng Việt
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh Sửa'), // Đổi nhãn sang tiếng Việt
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'), // Đổi nhãn sang tiếng Việt
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa Nhiều'), // Đổi nhãn sang tiếng Việt
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
