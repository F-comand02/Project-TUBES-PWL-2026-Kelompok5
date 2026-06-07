<?php

namespace App\Filament\Resources\Logistics;

use App\Filament\Resources\Logistics\Pages\CreateLogistic;
use App\Filament\Resources\Logistics\Pages\EditLogistic;
use App\Filament\Resources\Logistics\Pages\ListLogistics;
use App\Filament\Resources\Logistics\Pages\ViewLogistic;
use App\Filament\Resources\Logistics\Schemas\LogisticForm;
use App\Filament\Resources\Logistics\Schemas\LogisticInfolist;
use App\Filament\Resources\Logistics\Tables\LogisticsTable;
use App\Models\Logistic;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LogisticResource extends Resource
{
    protected static ?string $model = Logistic::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;
    protected static ?string $recordTitleAttribute = 'item_name';
    protected static string|UnitEnum|null $navigationGroup = 'Management';

    public static function form(Schema $schema): Schema
    {
        return LogisticForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LogisticInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LogisticsTable::configure($table);
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
            'index' => ListLogistics::route('/'),
            'create' => CreateLogistic::route('/create'),
            'view' => ViewLogistic::route('/{record}'),
            'edit' => EditLogistic::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'item_name',
            'description',
        ];
    }
}
