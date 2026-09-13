<?php

namespace App\Filament\Pages;

use App\Models\HomePageSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageHomePageSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static \UnitEnum|string|null $navigationGroup = 'Home Page';

    protected static ?string $navigationLabel = 'Page Text';

    protected static ?int $navigationSort = 99;

    protected string $view = 'filament.pages.manage-home-page-settings';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    public function mount(): void
    {
        $this->form->fill(HomePageSetting::firstOrCreate([])->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('"Who we are" teaser')
                    ->schema([
                        TextInput::make('about_teaser_heading')
                            ->label('Heading')
                            ->columnSpanFull(),
                        Textarea::make('about_teaser_text')
                            ->label('Paragraph')
                            ->rows(3)
                            ->columnSpanFull(),
                        FileUpload::make('about_teaser_image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('home-page')
                            ->imageEditor(),
                        TextInput::make('about_teaser_link_url')
                            ->label('"Read More" link')
                            ->default('/about'),
                    ]),
                Section::make('Call to action')
                    ->schema([
                        TextInput::make('cta_heading')
                            ->label('Heading')
                            ->columnSpanFull(),
                        Textarea::make('cta_text')
                            ->label('Paragraph')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),
                Section::make('News section')
                    ->schema([
                        TextInput::make('view_all_news_url')
                            ->label('"View All News" link')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        HomePageSetting::firstOrCreate([])->update($this->form->getState());

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
