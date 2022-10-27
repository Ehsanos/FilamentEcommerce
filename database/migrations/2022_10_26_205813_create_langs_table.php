<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LnagResource\Pages;
use App\Filament\Resources\LnagResource\RelationManagers;
use App\Models\Lang;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LnagResource extends Resource
{
    protected static ?string $model = Lang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label='كلمة';
    protected static ?string $pluralLabel='الكلمات';
    protected static ?string $modelLabel='كلمة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')->schema([
                    Forms\Components\TextInput::make('word')->required()->label('المفتاح'),
                    Forms\Components\TextInput::make('ar')->required()->label('القيمة باللغة العربية'),
                    Forms\Components\TextInput::make('en')->required()->label('القيمة باللغة الإنكليزية'),
                    Forms\Components\TextInput::make('tr')->required()->label('القيمة باللغة التركية'),


                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('word')->label('المفتاح'),
                Tables\Columns\TextColumn::make('ar')->label(' العربية'),
                Tables\Columns\TextColumn::make('en')->label('الإنكليزية'),
                Tables\Columns\TextColumn::make('tr')->label(' التركية'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLnags::route('/'),
            'create' => Pages\CreateLnag::route('/create'),
            'edit' => Pages\EditLnag::route('/{record}/edit'),
        ];
    }
}
