<?php

namespace App\Filament\Resources\PriorityAreas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PriorityAreaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('priority-areas')
                    ->imageEditor(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull()
                    ->rows(3),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
