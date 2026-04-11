<?php

namespace App\Filament\Resources\Rols\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Rol')
                    ->description('Registre los datos del rol del sistema')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Rol')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Administrador, Bibliotecario, Lector'),
                    ]),
            ]);
    }
}
