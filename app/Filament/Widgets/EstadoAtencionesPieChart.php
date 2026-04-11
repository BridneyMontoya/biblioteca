<?php

namespace App\Filament\Widgets;

use App\Models\Atencion;
use Filament\Widgets\ChartWidget;

class EstadoAtencionesPieChart extends ChartWidget
{
    protected ?string $heading = 'Estado de Atenciones';

    protected static ?int $sort = 4;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $activas = Atencion::where('estado', 'activa')->count();
        $finalizadas = Atencion::where('estado', 'finalizada')->count();

        return [
            'datasets' => [
                [
                    'data' => [$activas, $finalizadas],
                    'backgroundColor' => [
                        'rgba(22, 163, 74,  0.85)',   // green-600  – Activas
                        'rgba(13, 148, 136, 0.85)',   // teal-600   – Finalizadas
                    ],
                    'borderColor' => ['#fff', '#fff'],
                    'borderWidth' => 2,
                ],
            ],
            'labels' => ['Activas', 'Finalizadas'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
