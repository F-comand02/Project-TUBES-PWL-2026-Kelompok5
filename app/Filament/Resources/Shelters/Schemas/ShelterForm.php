<?php

namespace App\Filament\Resources\Shelters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ShelterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('shelter_name')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric(),
                TextInput::make('current_refugees')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('status')
                    ->options(['active' => 'Active', 'full' => 'Full', 'closed' => 'Closed'])
                    ->default('active')
                    ->required(),
            ]);
    }
}
