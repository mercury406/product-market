<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return static::$modelLabel ?? __('custom.product');
    }

    public static function getPluralModelLabel(): string
    {
        return static::$modelLabel ?? __('custom.products');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('custom.shop');
    }

    protected function getTableRecordClassesUsing(): ?Closure
    {
        return fn (Model $record) => $record->deleted_at ? 'border-red-600' : '';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->preload()
                        ->label(__('custom.category'))
                        ->searchable()
                        ->required(),
                    TextInput::make('name')
                        ->label(__('custom.name'))
                        ->required(),
                    Textarea::make('description')
                        ->label(__('custom.description'))
                        ->required(),
                    TextInput::make('price')
                        ->label(__('custom.price'))
                        ->numeric()
                        ->required(),
                    FileUpload::make('images')
                        ->label(__('custom.images'))
                        ->image()
                        ->directory(Product::IMG_FOLDER)
                        ->multiple()
                        ->minFiles(1)
                        ->maxFiles(9),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name'),
                TextColumn::make('name'),
                TextColumn::make('price'),
                TextColumn::make('description')
                    ->wrap(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
