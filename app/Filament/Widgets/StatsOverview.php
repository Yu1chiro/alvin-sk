<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Article; // Model Blog
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Supaya widget ini refresh otomatis tiap 15 detik (biar kelihatan live)
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            // Stats 1: Project
            Stat::make('Total Projects', Project::count())
                ->description('Portfolio showcase')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]), 

            // Stats 2: Blog (Baru)
            Stat::make('Total Articles', Article::count())
                ->description('Blog posts published')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning')
                ->chart([3, 5, 8, 2, 10, 15, 20])

           
        ];
    }
}
