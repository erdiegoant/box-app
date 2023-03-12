<?php

namespace App\Filament\Resources;

use App\Enums\BoxStatus;
use App\Filament\Resources\BoxResource\Pages;
use App\Models\Box;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Collection;

class BoxResource extends Resource
{
    protected static ?string $model = Box::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(collect(BoxStatus::cases())
                        ->flatMap(function (BoxStatus $status) {
                            return [
                                $status->value => str($status->name)->replaceFirst('_', ' '),
                            ];
                        })->toArray())
                    ->default(BoxStatus::DRAFT)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')->sortable(),
                Tables\Columns\TextColumn::make('country.name')->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('items_count')
                    ->sortable()
                    ->label('Items')
                    ->counts('items'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->before(function (Collection $records) {
                        $records->each(fn (Box $record) => $record->items()->delete());
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            BoxResource\RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBoxes::route('/'),
            'create' => Pages\CreateBox::route('/create'),
            'edit' => Pages\EditBox::route('/{record}/edit'),
        ];
    }
}
