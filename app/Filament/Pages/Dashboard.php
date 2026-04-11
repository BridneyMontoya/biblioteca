<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AtencionesPorMesChart;
use App\Filament\Widgets\EstadoAtencionesPieChart;
use App\Filament\Widgets\LibrosPorAreaChart;
use App\Filament\Widgets\StatsOverview;
use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $title = 'Panel de Control';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?int $navigationSort = -2;

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            AtencionesPorMesChart::class,
            LibrosPorAreaChart::class,
            EstadoAtencionesPieChart::class,
            AccountWidget::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 2;
    }
}
