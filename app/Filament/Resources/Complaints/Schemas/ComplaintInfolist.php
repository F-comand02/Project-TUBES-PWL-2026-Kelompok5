<?php

namespace App\Filament\Resources\Complaints\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ImageEntry;
class ComplaintInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Citizen'),
                        ImageEntry::make('firstImage.image_path')
                ->label('Complaint Photo')
                ->disk('public')
                ->getStateUsing(fn ($record) =>
                    $record->firstImage
                        ? 'complaints/' . $record->firstImage->image_path
                        : null
                )
                ->height(300)
                ->columnSpanFull(),

           TextEntry::make('view_image')
            ->label(' ')
            ->state('Klik untuk melihat gambar ukuran penuh')
            ->url(fn ($record) =>
                $record->firstImage
                    ? asset('storage/complaints/' . $record->firstImage->image_path)
                    : null
            )
            ->openUrlInNewTab()
            ->visible(fn ($record) => $record->firstImage !== null),
                TextEntry::make('assignedVolunteer.name')
                    ->label('Volunteer')
                    ->placeholder('-'),
                TextEntry::make('shelter.shelter_name')
                    ->label('Shelter')
                    ->placeholder('-'),
                TextEntry::make('handled_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('category')
                    ->badge(),
               TextEntry::make('urgency_level')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'high' => 'danger',
                        'medium' => 'warning',
                        'low' => 'success',
                        default => 'gray',
                    }),
               TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        default => 'gray',
                    }),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
               
            ]);
    }
}
