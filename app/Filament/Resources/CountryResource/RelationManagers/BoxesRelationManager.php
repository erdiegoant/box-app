<?php

namespace App\Filament\Resources\CountryResource\RelationManagers;

use App\Models\Box;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class BoxesRelationManager extends RelationManager
{
    protected static string $relationship = 'boxes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('items_count')
                    ->label('Items')
                    ->counts('items'),
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function getTableRecordUrlUsing(): \Closure|null
    {
        return fn (Box $record): string => url("admin/boxes/{$record->id}/edit");
    }
}
