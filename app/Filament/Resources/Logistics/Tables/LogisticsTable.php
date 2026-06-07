<?php

namespace App\Filament\Resources\Logistics\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;

class LogisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('category.category_name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('shelter.shelter_name')
                    ->label('Shelter')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('item_name')
                    ->searchable(),
                TextColumn::make('stock')
                    ->badge()
                    ->color(fn ($record) =>
                        $record->stock <= $record->minimum_stock
                            ? 'danger'
                            : 'success'
                    )
                    ->sortable(),
                TextColumn::make('minimum_stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('expired_date')
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
                Filter::make('low_stock')
                    ->label('Low Stock')
                    ->query(fn ($query) =>
                        $query->whereColumn(
                            'stock',
                            '<=',
                            'minimum_stock'
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
