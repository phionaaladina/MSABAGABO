<?php

namespace App\Filament\Resources\DivisionDutyCategories\Pages;

use App\Filament\Resources\DivisionDutyCategories\DivisionDutyCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDivisionDutyCategory extends EditRecord
{
    protected static string $resource = DivisionDutyCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
