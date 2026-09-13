<?php

namespace App\Filament\Resources\HomeStats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomeStatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->required()
                    ->numeric(),
                TextInput::make('suffix')
                    ->helperText('e.g. "+" for "439,605+"')
                    ->default(null),
                TextInput::make('label')
                    ->helperText('e.g. "Residents"')
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
