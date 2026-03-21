<?php

namespace App\Filament\Resources\Usuarios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UsuarioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos generales de los usuarios')
                    ->description('Ingrese los datos solicitados para completar el registro de los usuarios')
                    ->schema([
                        TextInput::make('nombres'),
                        TextInput::make('apellidos'),
                        TextInput::make('correo'),
                        TextInput::make('numero_documento'),
                        Select::make('tipo_usuario')
                            ->options([
                                'estudiante' => 'Estudiante',
                                'docente' => 'Docente',
                                'externo' => 'Externo',
                            ]),
                        Select::make('carrera_id')
                            ->relationship('carrera', 'nombre'),
                            Select::make('especialidad_id')
                            ->relationship('especialidad', 'nombre'),
                            Select::make('documento_id')
                            ->relationship('documento', 'nombre'),
                            Select::make('rol_id')
                            ->relationship('rol', 'nombre'),
                    ])->columns(),

            ])->columns(1);
    }
}

