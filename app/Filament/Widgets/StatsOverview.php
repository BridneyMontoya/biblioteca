<?php

namespace App\Filament\Widgets;

use App\Models\Atencion;
use App\Models\Libro;
use App\Models\Usuario;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalLibros = Libro::count();
        $librosDisponibles = Libro::where('stock_disponible', '>', 0)->count();
        $totalUsuarios = Usuario::count();
        $prestamosActivos = Atencion::where('tipo_atencion', 'prestamo')
            ->where('estado', 'activa')
            ->count();
        $consultasHoy = Atencion::where('tipo_atencion', 'consulta')
            ->whereDate('fecha_atencion', today())
            ->count();
        $atencionesMes = Atencion::whereMonth('fecha_atencion', now()->month)
            ->whereYear('fecha_atencion', now()->year)
            ->count();

        return [
            Stat::make('Total de Libros', $totalLibros)
                ->description("{$librosDisponibles} con stock disponible")
                ->descriptionIcon('heroicon-m-book-open')
                ->color('info')
                ->icon('heroicon-o-book-open'),

            Stat::make('Usuarios Registrados', $totalUsuarios)
                ->description('Estudiantes, docentes y externos')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->icon('heroicon-o-users'),

            Stat::make('Préstamos Activos', $prestamosActivos)
                ->description('Pendientes de devolución')
                ->descriptionIcon('heroicon-m-arrow-up-tray')
                ->color('warning')
                ->icon('heroicon-o-arrow-up-tray'),

            Stat::make('Consultas Hoy', $consultasHoy)
                ->description("Total este mes: {$atencionesMes}")
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary')
                ->icon('heroicon-o-eye'),
        ];
    }
}
