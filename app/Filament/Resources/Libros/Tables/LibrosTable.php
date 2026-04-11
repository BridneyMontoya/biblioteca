<?php

namespace App\Filament\Resources\Libros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class LibrosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->icon('heroicon-m-book-open'),

                TextColumn::make('autor')
                    ->label('Autor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('editorial')
                    ->label('Editorial')
                    ->toggleable(),

                TextColumn::make('isbn')
                    ->label('ISBN')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('anio')
                    ->label('Año')
                    ->sortable(),

                TextColumn::make('areaConocimiento.nombre')
                    ->label('Área')
                    ->badge()
                    ->color('info')
                    ->searchable(),

                TextColumn::make('stock_disponible')
                    ->label('Disponible')
                    ->badge()
                    ->color(fn ($state): string => $state > 0 ? 'success' : 'danger')
                    ->sortable(),

                TextColumn::make('stock_total')
                    ->label('Total')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->defaultSort('titulo')
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
