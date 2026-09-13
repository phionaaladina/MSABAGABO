<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('projects')
                    ->imageEditor(),
                Textarea::make('caption')
                    ->label('Description')
                    ->required()
                    ->columnSpanFull()
                    ->rows(4),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('status')
                    ->default(null)
                    ->helperText('e.g. Ongoing, Completed'),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
