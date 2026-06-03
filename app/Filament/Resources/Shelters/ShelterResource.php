<?php

namespace App\Filament\Resources\Shelters;

use App\Filament\Resources\Shelters\Pages\CreateShelter;
use App\Filament\Resources\Shelters\Pages\EditShelter;
use App\Filament\Resources\Shelters\Pages\ListShelters;
use App\Filament\Resources\Shelters\Pages\ViewShelter;
use App\Filament\Resources\Shelters\Schemas\ShelterForm;
use App\Filament\Resources\Shelters\Schemas\ShelterInfolist;
use App\Filament\Resources\Shelters\Tables\SheltersTable;
use App\Models\Shelter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ShelterResource extends Resource
{
    
    protected static ?string $model = Shelter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'shelter_name';

    public static function form(Schema $schema): Schema
    {
        return ShelterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ShelterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SheltersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListShelters::route('/'),
            'create' => CreateShelter::route('/create'),
            'view' => ViewShelter::route('/{record}'),
            'edit' => EditShelter::route('/{record}/edit'),
        ];
    }
}
