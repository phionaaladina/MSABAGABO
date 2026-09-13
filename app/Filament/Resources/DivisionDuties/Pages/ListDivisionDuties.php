<?php

namespace App\Filament\Resources\DivisionDuties\Pages;

use App\Filament\Resources\DivisionDuties\DivisionDutyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDivisionDuties extends ListRecords
{
    protected static string $resource = DivisionDutyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
