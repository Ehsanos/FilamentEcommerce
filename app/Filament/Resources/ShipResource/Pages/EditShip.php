<?php

namespace App\Filament\Resources\ShipResource\Pages;

use App\Filament\Resources\ShipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShip extends EditRecord
{
    protected static string $resource = ShipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
