<?php

namespace App\Filament\Widgets;

use App\Models\Libro;
use Filament\Widgets\ChartWidget;

class LibrosPorAreaChart extends ChartWidget
{
    protected ?string $heading = 'Libros por Área de Conocimiento';

    protected static ?int $sort = 3;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $libros = Libro::with('areaConocimiento')
            ->get()
            ->groupBy(fn ($libro) => $libro->areaConocimiento?->nombre ?? 'Sin área')
            ->map(fn ($group) => $group->count())
            ->sortByDesc(fn ($count) => $count)
            ->take(8);

        $colors = [
            'rgba(22,  163,  74,  0.85)',   // green-600
            'rgba(13,  148, 136,  0.85)',   // teal-600
            'rgba(16,  185, 129,  0.85)',   // emerald-500
            'rgba(5,   150, 105,  0.85)',   // emerald-600
            'rgba(20,  184, 166,  0.85)',   // teal-500
            'rgba(52,  211, 153,  0.85)',   // emerald-400
            'rgba(45,  212, 191,  0.85)',   // teal-400
            'rgba(110, 231, 183,  0.85)',   // emerald-300
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Libros',
                    'data' => $libros->values()->toArray(),
                    'backgroundColor' => array_slice($colors, 0, $libros->count()),
                    'borderWidth' => 1,
                    'borderColor' => '#fff',
                ],
            ],
            'labels' => $libros->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
