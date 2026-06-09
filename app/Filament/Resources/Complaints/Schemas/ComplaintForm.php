<?php

namespace App\Filament\Resources\Complaints\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ComplaintForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->preload()
                ->required()
                ->label('Citizen'),
                Select::make('assigned_volunteer_id')
                ->relationship('assignedVolunteer', 'name')
                ->searchable()
                ->preload()
                ->label('Volunteer'),
                Select::make('shelter_id')
                ->relationship('shelter', 'shelter_name')
                ->searchable()
                ->preload()
                ->label('Shelter'),
                TextInput::make('handled_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                ->rows(5)
                ->required()
                ->columnSpanFull(),
                Select::make('category')
                    ->options([
            'food' => 'Food',
            'water' => 'Water',
            'medical' => 'Medical',
            'shelter' => 'Shelter',
            'emergency' => 'Emergency',
            'other' => 'Other',
        ])
                    ->required(),
                Select::make('urgency_level')
                    ->options(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'])
                    ->default('medium')
                    ->required(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed'])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
