<?php

namespace App\Filament\Resources\DivisionDutyCategories\Pages;

use App\Filament\Resources\DivisionDutyCategories\DivisionDutyCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDivisionDutyCategories extends ListRecords
{
    protected static string $resource = DivisionDutyCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
