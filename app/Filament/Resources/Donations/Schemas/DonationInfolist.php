<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DonationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextEntry::make('user.name')
    ->label('Citizen'),

TextEntry::make('shelter.shelter_name')
    ->label('Shelter'),

TextEntry::make('volunteer.name')
    ->label('Volunteer')
    ->placeholder('-'),

                TextEntry::make('donor_name'),
                TextEntry::make('item_name'),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('donation_date')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
