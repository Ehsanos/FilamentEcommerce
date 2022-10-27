<?php

namespace App\Filament\Resources\ShipResource\Pages;

use App\Filament\Resources\ShipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShips extends ListRecords
{
    protected static string $resource = ShipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
