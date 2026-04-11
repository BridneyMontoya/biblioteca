<?php

namespace App\Filament\Resources\Especialidads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EspecialidadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Especialidad')
                    ->description('Registre los datos de la especialidad')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Especialidad')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ingrese el nombre de la especialidad'),
                    ]),
            ]);
    }
}
