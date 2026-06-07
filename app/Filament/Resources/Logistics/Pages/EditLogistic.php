<?php

namespace App\Filament\Resources\Logistics\Pages;

use App\Filament\Resources\Logistics\LogisticResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLogistic extends EditRecord
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
        ];
    }
}
