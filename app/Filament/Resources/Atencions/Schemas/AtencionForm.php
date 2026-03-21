<?php

namespace App\Filament\Resources\Atencions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AtencionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos quenerales')
                    ->description('Ingrese los datos solicitados para completar el registro de la atencion')
                    ->schema([
                Select::make('usuario_id')
                    ->relationship('usuario', 'nombres')
                    ->required(),

                Select::make('libro_id')
                    ->relationship('libro', 'titulo')
                    ->required(),

                Select::make('tipo_atencion')
                    ->options([
                        'consulta' => 'Consulta',
                        'prestamo' => 'Préstamo',
                    ])
                    ->required(),

                Select::make('estado')
                    ->options([
                        'activa' => 'Activa',
                        'finalizada' => 'Finalizada',
                    ])
                    ->required(),

                DateTimePicker::make('fecha_atencion')
                    ->required(),

                DateTimePicker::make('fecha_devolucion'),

       ])->columns(),

            ])->columns(1);
    }
}





