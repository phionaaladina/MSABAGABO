<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\DashboardStatsWidget;
use App\Filament\Widgets\RecentNewsWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->navigationGroups([
                NavigationGroup::make('Home Page'),
                NavigationGroup::make('About Us'),
                NavigationGroup::make('Divisions'),
                NavigationGroup::make('Departments'),
                NavigationGroup::make('Programs'),
                NavigationGroup::make('Opportunities'),
                NavigationGroup::make('News & Events'),
                NavigationGroup::make('Contact'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->brandName('Makindye Ssabagabo Admin')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                DashboardStatsWidget::class,
                RecentNewsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::USER_MENU_BEFORE,
                fn (): string => Blade::render('
                    <div class="flex flex-row items-center gap-3 px-4 mr-2 border-r border-gray-200 dark:border-white/10">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                            Welcome, <span class="font-bold">{{ auth()->user()->name ?? \'Admin\' }}</span>
                        </span>
                        <form method="POST" action="{{ route(\'filament.admin.auth.logout\') }}" class="m-0 flex items-center">
                            @csrf
                            <button type="submit" class="text-sm font-semibold text-danger-600 hover:text-danger-500 hover:underline whitespace-nowrap" style="color: #ef4444;">
                                Sign out
                            </button>
                        </form>
                    </div>
                ')
            );
    }
}
