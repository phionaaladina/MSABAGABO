<?php

namespace App\Filament\Widgets;

use App\Models\Leader;
use App\Models\NewsUpdate;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('News Updates', NewsUpdate::count())
                ->description('Total published news updates')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            Stat::make('Projects', Project::count())
                ->description('Total ongoing projects')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('success'),
            Stat::make('Programs', Program::count())
                ->description('Municipal programs')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('info'),
            Stat::make('Partners', Partner::count())
                ->description('Official partners')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('warning'),
            Stat::make('Leaders', Leader::count())
                ->description('Council leaders')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'),
        ];
    }
}
