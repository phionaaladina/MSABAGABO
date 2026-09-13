<?php

namespace App\Filament\Pages;

use App\Models\AboutPageSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageAboutPageSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static \UnitEnum|string|null $navigationGroup = 'About Us';

    protected static ?string $navigationLabel = 'Page Text';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-about-page-settings';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    public function mount(): void
    {
        $this->form->fill(AboutPageSetting::firstOrCreate([])->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero & Intro')
                    ->schema([
                        TextInput::make('hero_title')
                            ->label('Hero title')
                            ->columnSpanFull(),
                        Textarea::make('history_intro')
                            ->label('History & Background intro')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
                Section::make('Mandate')
                    ->schema([
                        Textarea::make('mandate_intro')
                            ->label('Mandate intro paragraph')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('mandate_promise')
                            ->label('"Our Mandate Is Our Promise" paragraph')
                            ->rows(3)
                            ->columnSpanFull(),
                        Repeater::make('mandate_functions')
                            ->label('Mandate functions (bullet list)')
                            ->simple(TextInput::make('item')->required())
                            ->defaultItems(0)
                            ->addActionLabel('Add function')
                            ->columnSpanFull(),
                    ]),
                Section::make('Priority Areas & Leadership intros')
                    ->schema([
                        Textarea::make('priority_areas_intro')
                            ->label('Priority Areas intro paragraph')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('leadership_intro')
                            ->label('Leadership intro paragraph')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
                Section::make('Quick Facts')
                    ->schema([
                        Repeater::make('quick_facts')
                            ->label('Quick facts')
                            ->schema([
                                TextInput::make('label')->required()->helperText('e.g. Divisions'),
                                TextInput::make('value')->required()->helperText('e.g. 3'),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->addActionLabel('Add fact')
                            ->columnSpanFull(),
                    ]),
                Section::make('Vision, Mission & Development Goal')
                    ->schema([
                        Repeater::make('pillars')
                            ->label('Pillars')
                            ->schema([
                                TextInput::make('tag')->required()->helperText('e.g. Vision, Mission, Development Goal'),
                                Textarea::make('text')->required()->rows(2),
                            ])
                            ->defaultItems(0)
                            ->addActionLabel('Add pillar')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        AboutPageSetting::firstOrCreate([])->update($this->form->getState());

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
