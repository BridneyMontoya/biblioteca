<?php

namespace App\Filament\Widgets;

use App\Models\Atencion;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class AtencionesPorMesChart extends ChartWidget
{
    protected ?string $heading = 'Atenciones por Mes';

    protected static ?int $sort = 2;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $meses = collect();
        $prestamos = collect();
        $consultas = collect();

        for ($i = 5; $i >= 0; $i--) {
            $fecha = Carbon::now()->subMonths($i);
            $meses->push($fecha->translatedFormat('M Y'));

            $prestamos->push(
                Atencion::where('tipo_atencion', 'prestamo')
                    ->whereMonth('fecha_atencion', $fecha->month)
                    ->whereYear('fecha_atencion', $fecha->year)
                    ->count()
            );

            $consultas->push(
                Atencion::where('tipo_atencion', 'consulta')
                    ->whereMonth('fecha_atencion', $fecha->month)
                    ->whereYear('fecha_atencion', $fecha->year)
                    ->count()
            );
        }

        return [
            'datasets' => [
                [
                    'label' => 'Préstamos',
                    'data' => $prestamos->toArray(),
                    'backgroundColor' => 'rgba(22, 163, 74, 0.15)',
                    'borderColor' => 'rgb(22, 163, 74)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Consultas',
                    'data' => $consultas->toArray(),
                    'backgroundColor' => 'rgba(13, 148, 136, 0.15)',
                    'borderColor' => 'rgb(13, 148, 136)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $meses->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
