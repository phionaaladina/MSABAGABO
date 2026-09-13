<?php

namespace App\Filament\Resources\ProgramStats\Pages;

use App\Filament\Resources\ProgramStats\ProgramStatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramStats extends ListRecords
{
    protected static string $resource = ProgramStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
