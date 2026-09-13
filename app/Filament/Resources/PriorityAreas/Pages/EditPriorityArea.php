<?php

namespace App\Filament\Resources\PriorityAreas\Pages;

use App\Filament\Resources\PriorityAreas\PriorityAreaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPriorityArea extends EditRecord
{
    protected static string $resource = PriorityAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
