<?php

namespace App\Filament\Resources\PriorityAreas;

use App\Filament\Resources\PriorityAreas\Pages\CreatePriorityArea;
use App\Filament\Resources\PriorityAreas\Pages\EditPriorityArea;
use App\Filament\Resources\PriorityAreas\Pages\ListPriorityAreas;
use App\Filament\Resources\PriorityAreas\Schemas\PriorityAreaForm;
use App\Filament\Resources\PriorityAreas\Tables\PriorityAreasTable;
use App\Models\PriorityArea;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PriorityAreaResource extends Resource
{
    protected static ?string $model = PriorityArea::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'About Us';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return PriorityAreaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PriorityAreasTable::configure($table);
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
            'index' => ListPriorityAreas::route('/'),
            'create' => CreatePriorityArea::route('/create'),
            'edit' => EditPriorityArea::route('/{record}/edit'),
        ];
    }
}
