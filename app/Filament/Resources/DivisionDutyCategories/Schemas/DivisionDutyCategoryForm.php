<?php

namespace App\Filament\Resources\DivisionDutyCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DivisionDutyCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category name')
                    ->helperText('e.g. "Health", "Education"')
                    ->required(),
                TextInput::make('icon')
                    ->default(null),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
