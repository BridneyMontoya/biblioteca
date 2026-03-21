<?php

namespace App\Filament\Resources\Documentos\Schemas;

use App\Models\Documento;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DocumentoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Documento $record): bool => $record->trashed()),
            ]);
    }
}
