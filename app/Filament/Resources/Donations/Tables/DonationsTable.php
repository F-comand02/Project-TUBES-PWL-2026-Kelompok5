<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('shelter.shelter_name')
    ->label('Shelter')
    ->searchable(),

TextColumn::make('user.name')
    ->label('Citizen')
    ->searchable(),

TextColumn::make('volunteer.name')
    ->label('Volunteer')
    ->placeholder('-')
    ->searchable(),
                TextColumn::make('donor_name')
                    ->searchable(),
                TextColumn::make('item_name')
                    ->searchable(),
                TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'pending' => 'warning',
                        'on_delivery' => 'info',
                        'confirmed' => 'success',
                        'received' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('donation_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
