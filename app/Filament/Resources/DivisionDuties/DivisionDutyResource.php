<?php

namespace App\Filament\Resources\DivisionDuties;

use App\Filament\Resources\DivisionDuties\Pages\CreateDivisionDuty;
use App\Filament\Resources\DivisionDuties\Pages\EditDivisionDuty;
use App\Filament\Resources\DivisionDuties\Pages\ListDivisionDuties;
use App\Filament\Resources\DivisionDuties\Schemas\DivisionDutyForm;
use App\Filament\Resources\DivisionDuties\Tables\DivisionDutiesTable;
use App\Models\DivisionDuty;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DivisionDutyResource extends Resource
{
    protected static ?string $model = DivisionDuty::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Divisions';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return DivisionDutyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DivisionDutiesTable::configure($table);
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
            'index' => ListDivisionDuties::route('/'),
            'create' => CreateDivisionDuty::route('/create'),
            'edit' => EditDivisionDuty::route('/{record}/edit'),
        ];
    }
}
