<?php

namespace App\Filament\Resources\ProgramStats;

use App\Filament\Resources\ProgramStats\Pages\CreateProgramStat;
use App\Filament\Resources\ProgramStats\Pages\EditProgramStat;
use App\Filament\Resources\ProgramStats\Pages\ListProgramStats;
use App\Filament\Resources\ProgramStats\Schemas\ProgramStatForm;
use App\Filament\Resources\ProgramStats\Tables\ProgramStatsTable;
use App\Models\ProgramStat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramStatResource extends Resource
{
    protected static ?string $model = ProgramStat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Programs';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ProgramStatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramStatsTable::configure($table);
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
            'index' => ListProgramStats::route('/'),
            'create' => CreateProgramStat::route('/create'),
            'edit' => EditProgramStat::route('/{record}/edit'),
        ];
    }
}
