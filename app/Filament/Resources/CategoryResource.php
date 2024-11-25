<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Quản lý chung'; // Nhóm điều hướng
    protected static ?string $recordTitleAttribute = 'name'; // Thuộc tính tiêu đề của bản ghi

    public static function getPluralModelLabel(): string
    {
        return 'Danh mục';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông Tin Danh Mục') // Tiêu đề section
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên Danh Mục') // Đổi nhãn sang tiếng Việt
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            )
                            ->helperText('Nhập tên cho danh mục, ví dụ: "Điện thoại", "Laptop"'),

                        TextInput::make('slug')
                            ->label('Slug') // Đổi nhãn sang tiếng Việt
                            ->required()
                            ->maxLength(255)
                            ->dehydrated()
                            ->unique(Category::class, ignoreRecord: true)
                            ->helperText('Slug tự động được tạo từ tên danh mục. Không cần nhập thủ công.'),

                        Textarea::make('description')
                            ->label('Mô tả') // Đổi nhãn sang tiếng Việt
                            ->required()
                            ->maxLength(255)
                            ->helperText('Nhập mô tả ngắn về danh mục này.'),

                        // Thêm banner ở đây
                        FileUpload::make('banner')
                            ->label('Banner') // Đổi nhãn sang tiếng Việt
                            ->image()
                            ->directory('category_banners') // Tùy chỉnh thư mục lưu trữ banner
                            ->helperText('Tải lên hình ảnh banner cho danh mục. Kích thước khuyến nghị: 1200x600 px'),

                        Toggle::make('show_in_header')
                            ->label('Hiển Thị Trên Header') // Đổi nhãn sang tiếng Việt
                            ->required()
                            ->default(true)
                            ->helperText('Chọn để hiển thị danh mục này trên header của trang.'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Tên Danh Mục') // Đổi nhãn sang tiếng Việt
                    ->searchable(),

                ImageColumn::make('banner')
                    ->label('Banner') // Đổi nhãn sang tiếng Việt
                    ->circular(),

                TextColumn::make('slug')
                    ->label('Slug') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
           
                IconColumn::make('show_in_header')
                    ->label('Hiển Thị Trên Header') // Đổi nhãn sang tiếng Việt
                    ->boolean(),

                TextColumn::make('product_count')
                    ->label('Số Sản Phẩm')
                    ->getStateUsing(function (Category $record) {
                        return $record->product_cat()->count();
                    })
                    ->sortable(),
                    TextColumn::make('description')
                    ->label('Mô tả') // Đổi nhãn sang tiếng Việt
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Ngày Tạo') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ->sortable()
                    ->toggleable(),


                TextColumn::make('updated_at')
                    ->label('Ngày Cập Nhật') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                // Có thể thêm bộ lọc nếu cần
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
                        ->label('Xóa'), // Đổi nhãn sang tiếng Việt
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
