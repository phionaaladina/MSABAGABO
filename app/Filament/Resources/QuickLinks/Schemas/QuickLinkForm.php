<?php

namespace App\Filament\Resources\QuickLinks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuickLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('href')
                    ->label('Link URL')
                    ->url()
                    ->required(),
                FileUpload::make('icon')
                    ->label('Icon')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('quick-links'),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
