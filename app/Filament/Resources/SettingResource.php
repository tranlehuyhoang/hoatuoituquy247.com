<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // Thay đổi biểu tượng

    protected static ?string $navigationGroup = 'Cài Đặt'; // Thêm nhóm điều hướng

    protected static string $title = 'Quản Lý Cài Đặt'; // Thêm tiêu đề

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Cài đặt') // Đổi tên tab
                    ->tabs([


                        Tabs\Tab::make('Hướng dẫn đặt hoa')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\RichEditor::make('purchase_guide')
                                    ->columnSpanFull()
                                    ->label('Hướng dẫn mua hàng'),
                            ]),

                        Tabs\Tab::make('Hướng dẫn thanh toán')
                            ->icon('heroicon-o-credit-card')
                            ->schema([
                                Forms\Components\RichEditor::make('payment_guide')
                                    ->columnSpanFull()
                                    ->label('Hướng dẫn thanh toán'),
                            ]),

                        Tabs\Tab::make('Quy định vận chuyển')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Forms\Components\RichEditor::make('shipping_policy')
                                    ->columnSpanFull()
                                    ->label('Chính sách vận chuyển và giao nhận'),
                            ]),



                        Tabs\Tab::make('Giới Thiệu')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\RichEditor::make('introduction')
                                    ->columnSpanFull()
                                    ->label('Giới thiệu'),


                            ]),


                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Ngày cập nhật'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
