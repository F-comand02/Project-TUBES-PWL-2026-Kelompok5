<?php

namespace App\Filament\Resources\Logistics\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LogisticInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('shelter_id')
                    ->numeric(),
                TextEntry::make('item_name'),
                TextEntry::make('stock')
                    ->numeric(),
                TextEntry::make('minimum_stock')
                    ->numeric(),
                TextEntry::make('expired_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
