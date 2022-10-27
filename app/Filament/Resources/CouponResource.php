<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Tabs\Tab::make('منتج')
                    ->schema([
                        Forms\Components\Section::make('')->schema([Forms\Components\Toggle::make('status'),
                            Forms\Components\TextInput::make('name')->nullable(),
                            Forms\Components\Select::make('product_id')->options(Product::all()->pluck('name_en','id'))->nullable(),
                            Forms\Components\TextInput::make('code'),
                            Forms\Components\TextInput::make('count')->numeric()->default(0)->minValue(0),
                            Forms\Components\TextInput::make('percent')->numeric()->default(0)->minValue(0),
                            Forms\Components\DateTimePicker::make('start')->label('Start'),
                            Forms\Components\DateTimePicker::make('end')->label('End'),

                        ]),

                    ]),

//
//                Tabs\Tab::make('فئة')
//                    ->schema([
//                        Forms\Components\Section::make('')->schema([Forms\Components\Toggle::make('status'),
//                            Forms\Components\TextInput::make('name')->nullable(),
//                            Forms\Components\Select::make('category_id')->options(Category::all()->pluck('title_en','id'))->nullable(),
//                            Forms\Components\TextInput::make('code'),
//                            Forms\Components\TextInput::make('count')->numeric(),
//                            Forms\Components\TextInput::make('percent')->numeric(),
//                            Forms\Components\DateTimePicker::make('start')->label('Start'),
//                            Forms\Components\DateTimePicker::make('end')->label('End'),
//
//                        ]),
//
//                    ]),
//





                ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\BooleanColumn::make('status')->searchable(),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('count'),
                Tables\Columns\TextColumn::make('product_id')->exists('product'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
