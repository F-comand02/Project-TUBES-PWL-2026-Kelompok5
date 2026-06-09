<?php

namespace App\Filament\Resources\Complaints\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;

class ComplaintsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label('Citizen')
                ->searchable()
                ->sortable(),
                ImageColumn::make('firstImage.image_path')
                ->label('Photo'),
                TextColumn::make('assignedVolunteer.name')
                ->label('Volunteer')
                ->searchable(),
               TextColumn::make('shelter.shelter_name')
                ->label('Shelter')
                ->searchable(),
                TextColumn::make('handled_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('category')
                    ->badge(),
                TextColumn::make('urgency_level')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'high' => 'danger',
                    'medium' => 'warning',
                    'low' => 'success',
                    default => 'gray',
                }),
                TextColumn::make('status')
                ->badge()
                ->color(fn (string $state) => match ($state) {
                    'pending' => 'warning',
                    'processing' => 'info',
                    'completed' => 'success',
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
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                    ]),

                SelectFilter::make('urgency_level')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ]),
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
