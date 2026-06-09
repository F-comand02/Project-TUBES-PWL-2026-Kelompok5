<?php

namespace App\Filament\Resources\Logistics\Pages;

use App\Filament\Resources\Logistics\LogisticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLogistics extends ListRecords
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
