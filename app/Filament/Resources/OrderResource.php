<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use App\Enums\OrderStatus;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function getModelLabel(): string
    {
        return static::$modelLabel ?? __('custom.order');
    }

    public static function getPluralModelLabel(): string
    {
        return static::$modelLabel ?? __('custom.orders');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', OrderStatus::Created->value)->count();
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('custom.orders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('totalPrice')
                    ->disabled(),
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->label(__('custom.user'))
                        ->required(),
                    Select::make('status')
                        ->label(__('custom.order_status'))
                        ->options(OrderStatus::toArray())
                        ->required(),
                    Repeater::make('products')
                        ->label(__('custom.products'))
                        ->required()
                        ->schema([
                            Select::make('product_id')
                                ->label(__('custom.product'))
                                ->options(Product::all()->pluck('name', 'id'))
                                ->searchable()
                                ->preload(true),
                            TextInput::make('quantity')
                                ->label(__('custom.quantity'))
                                ->numeric()
                                ->required()
                                ->minValue(1)
                                ->default(1)
                        ])
                        ->columns(2),
                    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->formatStateUsing(fn($state) => OrderStatus::tryFrom($state)->label()),
                TextColumn::make('productsCount'),
                TextColumn::make('totalPrice'),
                TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:i:s'),
                TextColumn::make('updated_at')
                    ->dateTime('d-m-Y H:i:s'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('status', 'ASC')
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
