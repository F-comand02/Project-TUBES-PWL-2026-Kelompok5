<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Models\User;
use App\Models\LogisticsCategory;


class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Select::make('shelter_id')
    ->relationship('shelter', 'shelter_name')
    ->searchable()
    ->preload()
    ->required()
    ->label('Shelter'),

Select::make('user_id')
    ->relationship('user', 'name')
    ->searchable()
    ->preload()
    ->required()
    ->label('Citizen'),

Select::make('volunteer_id')
    ->label('Volunteer')
    ->options(
        User::whereHas('role', function ($query) {
            $query->where('role_name', 'volunteer');
        })->pluck('name', 'id')
    )
    ->searchable()
    ->preload(),
    Select::make('category_id')
    ->label('Category')
    ->relationship('category', 'category_name')
    ->searchable()
    ->preload()
    ->required(),
                TextInput::make('donor_name')
                    ->required(),
                TextInput::make('item_name')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'on_delivery' => 'On delivery',
                        'confirmed' => 'Confirmed',
                        'received' => 'Received',
                        
                    ])
                    ->default('pending')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('donation_date')
                    ->required(),
            ]);
    }
}
