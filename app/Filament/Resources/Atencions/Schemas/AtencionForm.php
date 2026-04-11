<?php

namespace App\Filament\Resources\Atencions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AtencionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Atención')
                    ->description('Registre los datos de la atención del usuario')
                    ->schema([
                        Select::make('usuario_id')
                            ->label('Usuario')
                            ->relationship('usuario', 'nombres')
                            ->required(),

                        Select::make('libro_id')
                            ->label('Libro')
                            ->relationship('libro', 'titulo')
                            ->required(),

                        Select::make('tipo_atencion')
                            ->label('Tipo de Atención')
                            ->options([
                                'consulta' => 'Consulta',
                                'prestamo' => 'Préstamo',
                            ])
                            ->required(),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activa' => 'Activa',
                                'finalizada' => 'Finalizada',
                            ])
                            ->required(),

                    ])->columns(2),

                Section::make('Fechas')
                    ->description('Información temporal de la atención')
                    ->schema([
                        DateTimePicker::make('fecha_atencion')
                            ->label('Fecha de Atención')
                            ->required()
                            ->placeholder('Seleccione fecha y hora'),

                        DateTimePicker::make('fecha_devolucion')
                            ->label('Fecha de Devolución')
                            ->nullable()
                            ->placeholder('Opcional - Seleccione fecha y hora si se devolvió'),

                    ])->columns(2),
            ]);
    }
}
