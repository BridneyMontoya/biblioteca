<?php

namespace App\Filament\Resources\Usuarios\Schemas;

use App\Models\Usuario;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UsuarioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos Personales')
                    ->schema([
                        TextEntry::make('nombres')
                            ->label('Nombres'),
                        TextEntry::make('apellidos')
                            ->label('Apellidos'),
                        TextEntry::make('correo')
                            ->label('Correo Electrónico'),
                        TextEntry::make('numero_documento')
                            ->label('Número de Documento'),
                    ])->columns(2),

                Section::make('Clasificación del Sistema')
                    ->schema([
                        TextEntry::make('tipo_usuario')
                            ->label('Tipo de Usuario'),
                        TextEntry::make('rol.nombre')
                            ->label('Rol del Sistema'),
                    ])->columns(2),

                Section::make('Información Académica')
                    ->schema([
                        TextEntry::make('carrera.nombre')
                            ->label('Carrera')
                            ->placeholder('-'),
                        TextEntry::make('especialidad.nombre')
                            ->label('Especialidad')
                            ->placeholder('-'),
                        TextEntry::make('documento.nombre')
                            ->label('Tipo de Documento'),
                    ])->columns(3),

                Section::make('Auditoría')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Creado')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Actualizado')
                            ->dateTime(),
                        TextEntry::make('deleted_at')
                            ->label('Eliminado')
                            ->dateTime()
                            ->placeholder('-')
                            ->visible(fn (Usuario $record): bool => $record->trashed()),
                    ])->columns(3),
            ]);
    }
}
