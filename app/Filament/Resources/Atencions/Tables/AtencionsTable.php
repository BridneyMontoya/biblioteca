<?php

namespace App\Filament\Resources\Atencions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class AtencionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.nombres')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-m-user'),

                TextColumn::make('libro.titulo')
                    ->label('Libro')
                    ->searchable()
                    ->limit(35),

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
                    ->label('Devolución')
                    ->dateTime('d/m/Y')
                    ->placeholder('—')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('tipo_atencion')
                    ->label('Tipo')
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
                TrashedFilter::make(),
            ])
            ->defaultSort('fecha_atencion', 'desc')
            ->striped()
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
