<?php

namespace App\Filament\Resources\ProgramStats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramStatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->helperText('e.g. "UGX 460B"')
                    ->required(),
                TextInput::make('label')
                    ->helperText('e.g. "GKMA-UDP metro investment"')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
