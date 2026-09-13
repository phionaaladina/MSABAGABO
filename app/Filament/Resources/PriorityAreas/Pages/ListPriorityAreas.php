<?php

namespace App\Filament\Resources\PriorityAreas\Pages;

use App\Filament\Resources\PriorityAreas\PriorityAreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPriorityAreas extends ListRecords
{
    protected static string $resource = PriorityAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
