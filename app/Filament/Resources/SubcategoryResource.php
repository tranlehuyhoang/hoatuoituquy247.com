<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoryResource\Pages;
use App\Models\Category; // Thêm dòng này để sử dụng model Category
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SubcategoryResource extends Resource
{
    protected static ?string $model = Subcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder'; // Thay đổi biểu tượng điều hướng
    
    protected static ?string $navigationGroup = 'Quản lý chung'; // Nhóm điều hướng
    
    public static function getPluralModelLabel(): string
    {
        return 'Danh Mục Con';
    }

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            // Phần mô tả cho danh mục
            Forms\Components\Section::make('Thông Tin Danh Mục')
                ->description('Vui lòng chọn danh mục và điền thông tin cho danh mục con.')
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Danh mục') // Nhãn cho trường
                        ->required()
                        ->relationship('category', 'name') // Liên kết đến model Category và lấy tên hiển thị
                        ->searchable(),
                ]),

            // Phần mô tả cho tên danh mục con
            Forms\Components\Section::make('Thông Tin Chi Tiết')
                ->description('Điền tên và slug cho danh mục con.')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        )
                        ->label('Tên Danh Mục Con'), // Nhãn cho tên danh mục con

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->dehydrated()
                        ->unique(Subcategory::class, ignoreRecord: true) // Vô hiệu hóa trường slug
                        ->label('Slug'), // Nhãn cho slug
                ]),
        ]);
}
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name') // Hiển thị tên danh mục từ model Category
                    ->label('Danh Mục') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên Danh Mục Con') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Tạo'), // Đổi nhãn sang tiếng Việt
    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Cập Nhật'), // Đổi nhãn sang tiếng Việt
            ])
            ->filters([
                // Có thể thêm bộ lọc nếu cần
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh sửa'),
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'),
                ]),
            ])->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'),
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
            'index' => Pages\ListSubcategories::route('/'),
            'create' => Pages\CreateSubcategory::route('/create'),
            'edit' => Pages\EditSubcategory::route('/{record}/edit'),
        ];
    }
}
