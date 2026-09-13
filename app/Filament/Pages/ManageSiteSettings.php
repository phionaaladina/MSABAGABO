<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSiteSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static \UnitEnum|string|null $navigationGroup = 'Contact';

    protected static ?string $navigationLabel = 'Contact & Social';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-site-settings';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::firstOrCreate([])->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('address')
                    ->label('Head office address')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('map_embed_url')
                    ->label('Map embed URL')
                    ->helperText('The Google Maps embed link used on the Contact page')
                    ->url()
                    ->columnSpanFull(),
                TextInput::make('directions_url')
                    ->label('"Get Directions" link')
                    ->url()
                    ->columnSpanFull(),
                TextInput::make('whatsapp_number')
                    ->label('WhatsApp number')
                    ->helperText('Digits only with country code, e.g. 256772653980')
                    ->columnSpanFull(),
                Repeater::make('phones')
                    ->label('Phone lines')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('number')->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Add phone line')
                    ->columnSpanFull(),
                Repeater::make('emails')
                    ->label('Email addresses')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('email')->email()->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Add email')
                    ->columnSpanFull(),
                Repeater::make('socials')
                    ->label('Social media links')
                    ->schema([
                        TextInput::make('label')->required()->helperText('e.g. Facebook, X, TikTok, YouTube'),
                        TextInput::make('href')->label('URL')->url()->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Add social link')
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        SiteSetting::firstOrCreate([])->update($this->form->getState());

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }
}
