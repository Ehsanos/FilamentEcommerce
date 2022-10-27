<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\ProductsRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Faker\Provider\Text;
use Filament\Forms;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Component\Console\Input\Input;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $inverseRelationship = 'section';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')->schema([
                SpatieMediaLibraryFileUpload::make('img')->collection('products')->label('الصورة'),
]),
                Forms\Components\TextInput::make('name_ar')->required()->label("الاسم بالعربي"),
                Forms\Components\TextInput::make('name_en')->required()->label("English"),
                Forms\Components\TextInput::make('price')->required()->numeric()->label("السعر"),
                Forms\Components\TextInput::make('discount')->numeric()->label("حسم")->default(0),
                Forms\Components\Checkbox::make('available')->label("متوفر"),

//                CheckboxList::make('category_id')
//                    ->relationship('category', 'title_en')->nullable(),
//                Forms\Components\TextInput::make('category_id')->numeric()->default(0)->hidden(),



            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_ar')->sortable(),
                Tables\Columns\TextColumn::make('name_en')->sortable(),
                Tables\Columns\TextColumn::make('price')->sortable(),
                Tables\Columns\TextColumn::make('discount')->sortable(),
                Tables\Columns\BooleanColumn::make('available')->sortable(),
                SpatieMediaLibraryImageColumn::make('img')->collection('products'),




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
//            CategoriesRelationManager::class,
//            ProductsRelationManager::class

        ];
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
