<?php

namespace App\Filament\Resources\AreaConocimientos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class AreaConocimientoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ingrese el área de conocimiento'),


            ]);
    }


}
