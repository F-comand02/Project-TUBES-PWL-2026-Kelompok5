<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ImageEntry;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('role_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('shelter.shelter_name')
                    ->label('Shelter')
                    ->placeholder('-')
                    ->visible(fn ($record) =>
                        $record->role?->role_name === 'volunteer'
                    ),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('profile_photo')
                ->label('Profile Photo')
                ->disk('public')
                ->getStateUsing(fn ($record) =>
                    $record->profile_photo
                        ? 'profile-photos/' . $record->profile_photo
                        : null
                )
                ->height(250),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('two_factor_code')
                    ->placeholder('-'),
                TextEntry::make('two_factor_expires_at')
                    ->dateTime()
                    ->placeholder('-'),
                IconEntry::make('two_factor_enabled')
                    ->boolean(),
                TextEntry::make('bio')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('date_of_birth')
                    ->date()
                    ->placeholder('-'),
               TextEntry::make('gender')
                ->formatStateUsing(fn (?string $state) => match ($state) {
                    'Male' => 'Laki-laki',
                    'Female' => 'Perempuan',
                    default => '-',
                }),

            TextEntry::make('skills')
                ->placeholder('-')
                ->visible(fn ($record) =>
                    $record->role?->role_name === 'volunteer'
                ),

            TextEntry::make('organization')
                ->placeholder('-')
                ->visible(fn ($record) =>
                    $record->role?->role_name === 'volunteer'
                ),

            TextEntry::make('experience')
                ->placeholder('-')
                ->visible(fn ($record) =>
                    $record->role?->role_name === 'volunteer'
                ),

            TextEntry::make('availability')
                ->formatStateUsing(fn (?string $state) => match ($state) {
                    'weekdays' => 'Weekdays',
                    'weekends' => 'Weekends',
                    'full_time' => 'Full Time',
                    'part_time' => 'Part Time',
                    default => '-',
                })
                ->visible(fn ($record) =>
                    $record->role?->role_name === 'volunteer'
                ),
            ]);
    }
}
