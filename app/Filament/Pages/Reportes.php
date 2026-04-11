<?php

namespace App\Filament\Pages;

use App\Models\Atencion;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class Reportes extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Reportes';

    protected static ?string $title = 'Reportes';

    protected static ?string $navigationLabel = 'Reportes de Atenciones';

    protected static ?int $navigationSort = 10;

    protected string $view = 'filament.pages.reportes';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Atencion::query()
                    ->with(['usuario', 'libro'])
                    ->latest('fecha_atencion')
            )
            ->columns([
                TextColumn::make('usuario.nombres')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-m-user'),

                TextColumn::make('usuario.tipo_usuario')
                    ->label('Tipo Usuario')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'estudiante' => 'info',
                        'docente' => 'success',
                        'externo' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('libro.titulo')
                    ->label('Libro')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->icon('heroicon-m-book-open'),

                TextColumn::make('libro.autor')
                    ->label('Autor')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tipo_atencion')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'prestamo' => 'warning',
                        'consulta' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'prestamo' => 'Préstamo',
                        'consulta' => 'Consulta',
                        default => $state,
                    }),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activa' => 'warning',
                        'finalizada' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'activa' => 'Activa',
                        'finalizada' => 'Finalizada',
                        default => $state,
                    }),

                TextColumn::make('fecha_atencion')
                    ->label('Fecha Atención')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('fecha_devolucion')
                    ->label('Fecha Devolución')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('Pendiente')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('tipo_atencion')
                    ->label('Tipo de Atención')
                    ->options([
                        'prestamo' => 'Préstamo',
                        'consulta' => 'Consulta',
                    ]),

                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activa' => 'Activa',
                        'finalizada' => 'Finalizada',
                    ]),

                Filter::make('fecha_rango')
                    ->label('Rango de Fechas')
                    ->form([
                        DatePicker::make('desde')
                            ->label('Desde'),
                        DatePicker::make('hasta')
                            ->label('Hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['desde'],
                                fn (Builder $q, $date) => $q->whereDate('fecha_atencion', '>=', $date)
                            )
                            ->when(
                                $data['hasta'],
                                fn (Builder $q, $date) => $q->whereDate('fecha_atencion', '<=', $date)
                            );
                    }),
            ])
            ->defaultSort('fecha_atencion', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }
}
