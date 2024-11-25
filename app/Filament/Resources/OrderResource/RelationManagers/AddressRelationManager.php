<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Full name (can combine first_name and last_name into one)
                TextInput::make('full_name')
                    ->label('Họ và tên')
                    ->required()
                    ->maxLength(255),
    
                // Phone number
                TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->required()
                    ->tel()
                    ->maxLength(20),
    
                // Province (Tỉnh/Thành phố)
                TextInput::make('province')
                    ->label('Tỉnh/Thành phố')
                    ->required()
                    ->maxLength(255),
    
                // District (Quận/Huyện)
                TextInput::make('district')
                    ->label('Quận/Huyện')
                    ->required()
                    ->maxLength(255),
    
                // Ward (Xã/Phường)
                TextInput::make('ward')
                    ->label('Xã/Phường')
                    ->required()
                    ->maxLength(255),
    
                // Detailed address (Địa chỉ chi tiết)
                Textarea::make('detailed_address')
                    ->label('Địa chỉ chi tiết')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
    

    public function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('full_name')
                ->label('Họ và tên'), // Label for full name
        
            TextColumn::make('phone')
                ->label('Số điện thoại'), // Label for phone number
        
            TextColumn::make('province')
                ->label('Tỉnh/Thành phố'), // Label for province (Tỉnh/Thành phố)
        
            TextColumn::make('district')
                ->label('Quận/Huyện'), // Label for district (Quận/Huyện)
        
            TextColumn::make('ward')
                ->label('Xã/Phường'), // Label for ward (Xã/Phường)
        
            TextColumn::make('detailed_address')
                ->label('Địa chỉ chi tiết'), // Label for detailed address
        ])
        
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
}
