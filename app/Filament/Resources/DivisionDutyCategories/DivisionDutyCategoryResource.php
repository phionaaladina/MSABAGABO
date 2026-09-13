<?php

namespace App\Filament\Resources\DivisionDutyCategories;

use App\Filament\Resources\DivisionDutyCategories\Pages\CreateDivisionDutyCategory;
use App\Filament\Resources\DivisionDutyCategories\Pages\EditDivisionDutyCategory;
use App\Filament\Resources\DivisionDutyCategories\Pages\ListDivisionDutyCategories;
use App\Filament\Resources\DivisionDutyCategories\Schemas\DivisionDutyCategoryForm;
use App\Filament\Resources\DivisionDutyCategories\Tables\DivisionDutyCategoriesTable;
use App\Models\DivisionDutyCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DivisionDutyCategoryResource extends Resource
{
    protected static ?string $model = DivisionDutyCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Divisions';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return DivisionDutyCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DivisionDutyCategoriesTable::configure($table);
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
            'index' => ListDivisionDutyCategories::route('/'),
            'create' => CreateDivisionDutyCategory::route('/create'),
            'edit' => EditDivisionDutyCategory::route('/{record}/edit'),
        ];
    }
}
