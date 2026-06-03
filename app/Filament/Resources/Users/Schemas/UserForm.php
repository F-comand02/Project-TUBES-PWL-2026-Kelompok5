<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('role_id')
                ->relationship('role', 'role_name')
                ->required()
                ->label('Role'),
               Select::make('shelter_id')
                ->relationship('shelter', 'shelter_name')
                ->searchable()
                ->preload()
                ->label('Shelter'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                Textarea::make('address')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('profile_photo')
                ->image()
                ->directory('profile-photos'),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                ->password()
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (string $operation) => $operation === 'create'),
                TextInput::make('two_factor_code')
                    ->default(null),
                DateTimePicker::make('two_factor_expires_at'),
                Toggle::make('two_factor_enabled')
                    ->required(),
                Textarea::make('bio')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('date_of_birth'),
                Select::make('gender')
                ->options([
                    'Male' => 'Laki-laki',
                    'Female' => 'Perempuan',
                ])
                ->placeholder('Pilih Gender'),
                Textarea::make('skills')
                    ->label('Volunteer Skills')
                    ->visible(fn ($get) => $get('role_id') == 3),

                TextInput::make('organization')
                    ->label('Organization')
                    ->visible(fn ($get) => $get('role_id') == 3),

                Textarea::make('experience')
                    ->label('Experience')
                    ->visible(fn ($get) => $get('role_id') == 3),

                Select::make('availability')
                    ->options([
                        'weekdays' => 'Weekdays',
                        'weekends' => 'Weekends',
                        'full_time' => 'Full Time',
                        'part_time' => 'Part Time',
                    ])
                    ->visible(fn ($get) => $get('role_id') == 3),
            ]);
    }
}
