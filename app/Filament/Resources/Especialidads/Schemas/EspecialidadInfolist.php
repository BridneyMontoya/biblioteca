<?php

namespace App\Filament\Resources\Especialidads\Schemas;

use App\Models\Especialidad;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EspecialidadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Especialidad')
                    ->schema([
                        TextEntry::make('nombre')
                            ->label('Nombre'),
                    ]),

                Section::make('Auditoría')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Creado')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Actualizado')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->label('Eliminado')
                            ->dateTime()
                            ->placeholder('-')
                            ->visible(fn (Especialidad $record): bool => $record->trashed()),
                    ])->columns(3),
            ]);
    }
}
