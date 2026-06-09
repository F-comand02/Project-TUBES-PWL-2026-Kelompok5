<?php

namespace App\Filament\Resources\Logistics\Pages;

use App\Filament\Resources\Logistics\LogisticResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLogistic extends ViewRecord
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
