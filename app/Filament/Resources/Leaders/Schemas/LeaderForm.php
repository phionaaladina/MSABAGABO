<?php

namespace App\Filament\Resources\Leaders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->helperText('e.g. "Mayor", "Town Clerk"')
                    ->required(),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('leaders')
                    ->imageEditor(),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
