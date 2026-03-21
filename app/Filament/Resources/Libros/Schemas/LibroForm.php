<?php


namespace App\Filament\Resources\Libros\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;


class LibroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del libro')
                    ->description('Ingrese la información del libro')
                    ->schema([

                        TextInput::make('titulo')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('autor')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('editorial')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('año')
                            ->numeric()
                            ->required(),

                        TextInput::make('isbn')
                            ->maxLength(20)
                            ->required(),

                        Select::make('area_conocimiento_id')
                            ->relationship('areaConocimiento', 'nombre')
                            ->required(),

                        TextInput::make('stock_total')
                            ->numeric()
                            ->required(),

                        TextInput::make('stock_disponible')
                            ->numeric()
                            ->required(),

                    ])->columns(2),
            ]);
    }
}
