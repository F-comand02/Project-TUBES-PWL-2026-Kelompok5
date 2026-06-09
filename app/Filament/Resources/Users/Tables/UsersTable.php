<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('role.role_name')
                ->label('Role')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'admin' => 'danger',
                    'citizen' => 'info',
                    'volunteer' => 'success',
                    default => 'gray',
                })
                ->sortable()
                ->searchable(),
               TextColumn::make('shelter.shelter_name')
                ->label('Shelter')
                ->sortable()
                ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('profile_photo')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                ->badge()
                ->formatStateUsing(fn (?string $state) => match ($state) {
                    'Male' => 'Laki-laki',
                    'Female' => 'Perempuan',
                    default => '-',
                })
                ->color(fn (?string $state) => match ($state) {
                    'Male' => 'info',
                    'Female' => 'success',
                    default => 'gray',
                }),
                TextColumn::make('skills')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('organization')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('experience')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('availability')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role_id')
                    ->relationship('role', 'role_name')
                    ->label('Role'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                 DeleteAction::make()
                ->requiresConfirmation()
                ->modalHeading('Delete Complaint')
                ->modalDescription('Are you sure you want to delete this complaint?')
                ->successNotificationTitle('Complaint deleted successfully'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
