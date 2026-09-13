<?php

namespace App\Filament\Resources\Divisions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DivisionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-filled from the name. Used in the page URL.'),
                TextInput::make('tagline')
                    ->default(null),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('divisions')
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
