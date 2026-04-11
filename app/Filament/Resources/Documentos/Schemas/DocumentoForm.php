<?php

namespace App\Filament\Resources\Documentos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Tipo de Documento')
                    ->description('Registre los tipos de documentos válidos')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Documento')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: DNI, Pasaporte, Carnet de Extranjería'),
                    ]),
            ]);
    }
}
