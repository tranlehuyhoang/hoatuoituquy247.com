<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\OrdersRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{

    protected static ?string $model = User::class; // Thay đổi model nếu cần

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Biểu tượng điều hướng
    protected static ?string $navigationGroup = 'Cài Đặt'; // Nhóm điều hướng
    protected static ?string $recordTitleAttribute = 'name'; // Thuộc tính tiêu đề của bản ghi
    
    public static function getPluralModelLabel(): string
    {
        return 'Người Dùng';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông Tin Người Dùng') // Tiêu đề section
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên') // Nhãn cho trường Tên
                            ->required()
                            ->placeholder('Nhập tên của bạn'), // Thêm placeholder
    
                        Forms\Components\TextInput::make('email')
                            ->label('Email') // Nhãn cho trường Email
                            ->email()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->placeholder('Nhập địa chỉ email của bạn'), // Thêm placeholder
    
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Ngày Xác Minh Email') // Nhãn cho trường Ngày Xác Minh Email
                            ->default(now()),
    
                        Forms\Components\TextInput::make('password')
                            ->label('Mật Khẩu') // Nhãn cho trường Mật Khẩu
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                            ->placeholder('Nhập mật khẩu của bạn'), // Thêm placeholder
                    ])
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên') // Đổi nhãn sang tiếng Việt
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('email')
                    ->label('Email') // Nhãn Email
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Ngày Xác Minh Email') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày Tạo') // Đổi nhãn sang tiếng Việt
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Có thể thêm bộ lọc nếu cần
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh Sửa'), // Đổi nhãn sang tiếng Việt
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'), // Đổi nhãn sang tiếng Việt
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'), // Đổi nhãn sang tiếng Việt
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
            OrdersRelationManager::class
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
     public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
