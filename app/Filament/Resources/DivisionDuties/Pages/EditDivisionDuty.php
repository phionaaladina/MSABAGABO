<?php

namespace App\Filament\Resources\DivisionDuties\Pages;

use App\Filament\Resources\DivisionDuties\DivisionDutyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDivisionDuty extends EditRecord
{
    protected static string $resource = DivisionDutyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
