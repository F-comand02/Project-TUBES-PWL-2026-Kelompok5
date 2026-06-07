<?php

namespace App\Filament\Resources\Logistics\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class LogisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'category_name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('shelter_id')
                    ->relationship('shelter', 'shelter_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('item_name')
                    ->required(),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
                TextInput::make('minimum_stock')
                    ->required()
                    ->numeric()
                    ->default(10),
                DatePicker::make('expired_date'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
