<?php

namespace App\Filament\Resources\Libros\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LibroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos Bibliográficos')
                    ->description('Información principal del libro')
                    ->schema([

                        TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ingrese el título del libro'),

                        TextInput::make('autor')
                            ->label('Autor')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nombre del autor'),

                        TextInput::make('editorial')
                            ->label('Editorial')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Nombre de la editorial'),

                        TextInput::make('anio')
                            ->label('Año de Publicación')
                            ->numeric()
                            ->required()
                            ->placeholder('Ej: 2023'),

                        TextInput::make('isbn')
                            ->label('ISBN')
                            ->maxLength(20)
                            ->required()
                            ->placeholder('Ej: 978-0-134-61099-9'),

                    ])->columns(2),

                Section::make('Clasificación y Stock')
                    ->description('Categorización y disponibilidad del libro')
                    ->schema([

                        Select::make('area_conocimiento_id')
                            ->label('Área de Conocimiento')
                            ->relationship('areaConocimiento', 'nombre')
                            ->required(),

                        TextInput::make('stock_total')
                            ->label('Stock Total')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->placeholder('Cantidad total de copias'),

                        TextInput::make('stock_disponible')
                            ->label('Stock Disponible')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->placeholder('Copias disponibles para préstamo'),

                    ])->columns(3),
            ]);
    }
}
