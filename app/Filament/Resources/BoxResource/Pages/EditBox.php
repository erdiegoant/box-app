<?php

namespace App\Filament\Resources\BoxResource\Pages;

use App\Filament\Resources\BoxResource;
use App\Models\Box;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBox extends EditRecord
{
    protected static string $resource = BoxResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(fn (Box $record) => $record->items()->delete())
                ->requiresConfirmation(),
        ];
    }
}
