<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // Biểu tượng điều hướng
    
    protected static ?string $navigationGroup = 'Quản lý chung'; // Nhóm điều hướng
    
    protected static string $title = 'Quản Lý Slide'; // Tiêu đề
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Tải Lên Hình Ảnh') // Tiêu đề section
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->required()
                        ->label('Hình Ảnh') // Đổi nhãn sang tiếng Việt
                        ->helperText('Tải lên hình ảnh sản phẩm hoặc tài liệu liên quan. Chọn một hình ảnh có định dạng hợp lệ (jpg, png, gif).'), // Mô tả dễ hiểu
        
                    Forms\Components\TextInput::make('link') // Thêm trường link
                        ->required() // Nếu cần, có thể bỏ đi nếu không bắt buộc
                        ->label('Liên Kết') // Đổi nhãn sang tiếng Việt
                        ->helperText('Nhập liên kết đến sản phẩm hoặc trang liên quan.') // Mô tả dễ hiểu
                        ->url(), // Kiểm tra định dạng URL
                ])
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'), // Đổi nhãn sang tiếng Việt
                Tables\Columns\ImageColumn::make('image')
                    ->label('Hình Ảnh'), // Đổi nhãn sang tiếng Việt
                Tables\Columns\TextColumn::make('link')
                    ->sortable()
                    ->label('Liên kết'), // Đổi nhãn sang tiếng Việt
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}
