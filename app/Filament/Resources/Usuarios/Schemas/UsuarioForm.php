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
                Section::make('Datos Personales')
                    ->description('Información básica del usuario')
                    ->schema([
                        TextInput::make('nombres')
                            ->label('Nombres')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Ingrese nombres'),
                        TextInput::make('apellidos')
                            ->label('Apellidos')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Ingrese apellidos'),
                        TextInput::make('correo')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->unique(table: 'usuarios', column: 'correo', ignoreRecord: true)
                            ->placeholder('usuario@ejemplo.com'),
                        TextInput::make('numero_documento')
                            ->label('Número de Documento')
                            ->required()
                            ->unique(table: 'usuarios', column: 'numero_documento', ignoreRecord: true)
                            ->placeholder('Ej: 12345678'),
                    ])->columns(2),

                Section::make('Tipo y Clasificación')
                    ->description('Categorización del usuario en el sistema')
                    ->schema([
                        Select::make('tipo_usuario')
                            ->label('Tipo de Usuario')
                            ->options([
                                'estudiante' => 'Estudiante',
                                'docente' => 'Docente',
                                'externo' => 'Externo',
                            ])
                            ->required(),
                        Select::make('rol_id')
                            ->label('Rol del Sistema')
                            ->relationship('rol', 'nombre')
                            ->required(),
                    ])->columns(2),

                Section::make('Información Académica')
                    ->description('Datos de carrera, especialidad y documento')
                    ->schema([
                        Select::make('carrera_id')
                            ->label('Carrera')
                            ->relationship('carrera', 'nombre')
                            ->nullable(),
                        Select::make('especialidad_id')
                            ->label('Especialidad')
                            ->relationship('especialidad', 'nombre')
                            ->nullable(),
                        Select::make('documento_id')
                            ->label('Tipo de Documento')
                            ->relationship('documento', 'nombre')
                            ->required(),
                    ])->columns(3),
            ]);
    }
}
