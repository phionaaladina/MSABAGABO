<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('gallery')
                    ->imageEditor()
                    ->columnSpanFull(),
                Select::make('category')
                    ->options([
                        'works' => 'Infrastructure & Site Works',
                        'governance' => 'Grievance Redress & Community',
                        'partners' => 'Partner & Program Visits',
                    ])
                    ->required()
                    ->default('works'),
                TextInput::make('title')
                    ->default(null),
                Textarea::make('caption')
                    ->default(null)
                    ->columnSpanFull()
                    ->rows(2),
                TextInput::make('sort_order')
                    ->label('Display order')
                    ->helperText('Lower numbers show first')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
