<?php

namespace App\Filament\Resources\Shelters\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ShelterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('shelter_name'),
                TextEntry::make('address')
                    ->columnSpanFull(),
                TextEntry::make('capacity')
                    ->numeric(),
                TextEntry::make('current_refugees')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
