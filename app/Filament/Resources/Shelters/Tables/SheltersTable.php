<?php

namespace App\Filament\Resources\Shelters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class SheltersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('shelter_name')
                    ->searchable(),
                TextColumn::make('capacity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('current_refugees')
                    ->badge()
                    ->color(fn ($record) =>
                        $record->current_refugees >= $record->capacity
                            ? 'danger'
                            : 'success'
                    ),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'active' => 'success',
                        'full' => 'warning',
                        'closed' => 'danger',
                        default => 'gray',
                    }),
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
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'full' => 'Full',
                        'closed' => 'Closed',
                    ]),
                Filter::make('full_capacity')
                    ->label('Full Capacity')
                    ->query(fn ($query) =>
                        $query->whereColumn(
                            'current_refugees',
                            '>=',
                            'capacity'
                        )
                    ),
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
