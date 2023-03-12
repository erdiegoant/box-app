<?php

namespace App\Filament\Resources\BoxResource\RelationManagers;

use App\Enums\BoxItemStatus;
use App\Models\Item;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Collection;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(collect(BoxItemStatus::cases())
                        ->flatMap(fn (BoxItemStatus $status) => [$status->value => $status->name])
                        ->toArray()
                    )->default(BoxItemStatus::CREATED)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('status')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->action(function (Item $record) {
                        return $record->update([
                            'status' => BoxItemStatus::VERIFIED->value,
                        ]);
                    })
                    ->requiresConfirmation()
                    ->label('Verify')
                    ->hidden(fn (Item $record) => $record->status === BoxItemStatus::VERIFIED)
                    ->icon('heroicon-o-check'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('verify_all')
                ->label('Verify all')
                ->requiresConfirmation()
                ->icon('heroicon-o-check')
                ->deselectRecordsAfterCompletion()
                ->action(function (Collection $records) {
                    return $records->each(function (Item $record) {
                        $record->update([
                            'status' => BoxItemStatus::VERIFIED->value,
                        ]);
                    });
                }),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
