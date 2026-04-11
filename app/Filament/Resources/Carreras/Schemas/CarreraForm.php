<?php

namespace App\Filament\Resources\Carreras\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CarreraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Carrera')
                    ->description('Registre los datos de la carrera académica')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Carrera')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Ingeniería de Sistemas'),

                        Select::make('area_conocimiento_id')
                            ->label('Área de Conocimiento')
                            ->relationship('area', 'nombre')
                            ->required()
                            ->placeholder('Seleccione un área'),
                    ])->columns(2),
            ]);
    }
}
