<?php

namespace App\Filament\Resources\ProgramStats\Pages;

use App\Filament\Resources\ProgramStats\ProgramStatResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramStat extends EditRecord
{
    protected static string $resource = ProgramStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
