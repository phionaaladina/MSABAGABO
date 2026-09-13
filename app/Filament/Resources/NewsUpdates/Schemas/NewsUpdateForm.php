<?php

namespace App\Filament\Resources\NewsUpdates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsUpdateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-filled from the title. Only change this if you know what it does.'),
                DatePicker::make('published_date')
                    ->required()
                    ->default(now()),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('news')
                    ->imageEditor(),
                Textarea::make('body')
                    ->label('Article details')
                    ->helperText('Write the full news story here. It appears on the article page when a visitor selects Read more.')
                    ->default(null)
                    ->columnSpanFull()
                    ->rows(6),
                TextInput::make('external_url')
                    ->label('Read more link (optional)')
                    ->url()
                    ->default(null),
                Toggle::make('is_published')
                    ->label('Visible on website')
                    ->default(true),
            ]);
    }
}
