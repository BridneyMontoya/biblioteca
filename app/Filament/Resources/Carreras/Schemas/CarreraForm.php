<?php

namespace App\Filament\Resources\Carreras\Schemas;


use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use function Laravel\Prompts\select;

class CarreraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                ->label("Nombre de la carrera")
                    ->required()
                    ->maxLength(255),

                    Select::make('area_conocimiento_id')
                    ->label("Area de conocimiento")
                    ->relationship('area', 'nombre')
                    ->required()
            ]);
    }
}


