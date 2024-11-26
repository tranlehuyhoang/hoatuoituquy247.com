<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Quản lý chung'; // Nhóm điều hướng
    protected static ?string $recordTitleAttribute = 'name'; // Thuộc tính tiêu đề của bản ghi

    public static function getPluralModelLabel(): string
    {
        return 'Sản phẩm';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Thông Tin Sản Phẩm')
                            ->collapsible()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn(string $operation, $state, Forms\Set $set) =>
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                    )
                                    ->label('Tên Sản Phẩm'),

                                TextInput::make('slug')
                                    ->required()

                                    ->dehydrated()
                                    ->unique(Product::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->label('Slug'),

                                TextInput::make('code')
                                    ->required()

                                    ->dehydrated()
                                    ->unique(Product::class, 'code', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->label('Mã Sản Phẩm'),

                                Textarea::make('short_description')
                                    ->columnSpanFull()
                                    ->label('Mô Tả Ngắn'),

                                RichEditor::make('description')
                                    ->columnSpanFull()
                                    ->fileAttachmentsDirectory('products')
                                    ->label('Mô Tả Chi Tiết')
                            ])->columns(2),



                    ])->columnSpan(3),

                Group::make()
                    ->schema([


                        Section::make('Liên Kết')
                            ->collapsible()
                            ->schema([
                                Select::make('category_id')
                                    ->required()
                                    ->label('Danh Mục')
                                    ->options(Category::all()->pluck('name', 'id'))
                                    ->placeholder('Chọn danh mục sản phẩm'),

                                TextInput::make('price')
                                    ->numeric()
                                    ->required()
                                    ->default(0)
                                    ->label('Giá Bán'),
                            ]),
                        Section::make('Hình Ảnh')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('images')
                                    ->directory('products')
                                    ->reorderable()
                                    ->required()
                                    ->multiple()
                                    ->label('Tải Lên Hình Ảnh'),
                            ]),


                    ])->columnSpan(3),


            ])->columns(3);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
                Tables\Columns\ImageColumn::make('images')
                    ->label('Ảnh') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên Sản Phẩm') // Đổi nhãn sang tiếng Việt
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh Mục') // Đổi nhãn sang tiếng Việt
                    ->sortable(),



                Tables\Columns\TextColumn::make('price')
                    ->label('Giá') // Đổi nhãn sang tiếng Việt
                    ->money('VND')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug') // Đổi nhãn sang tiếng Việt
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày Tạo') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày Cập Nhật') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Danh Mục') // Đổi nhãn sang tiếng Việt
                    ->relationship('category', 'name')
                    ->preload(),

                SelectFilter::make('brand')
                    ->label('Thương Hiệu') // Đổi nhãn sang tiếng Việt
                    ->relationship('brand', 'name')
                    ->preload()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
