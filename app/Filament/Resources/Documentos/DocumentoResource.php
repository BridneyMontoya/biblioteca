<?php

namespace App\Filament\Resources\Documentos;

use App\Filament\Resources\Documentos\Pages\CreateDocumento;
use App\Filament\Resources\Documentos\Pages\EditDocumento;
use App\Filament\Resources\Documentos\Pages\ListDocumentos;
use App\Filament\Resources\Documentos\Pages\ViewDocumento;
use App\Filament\Resources\Documentos\Schemas\DocumentoForm;
use App\Filament\Resources\Documentos\Schemas\DocumentoInfolist;
use App\Filament\Resources\Documentos\Tables\DocumentosTable;
use App\Models\Documento;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DocumentoResource extends Resource
{
    protected static ?string $model = Documento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';
    protected static UnitEnum|string|null $navigationGroup = 'Ajustes';

    public static function form(Schema $schema): Schema
    {
        return DocumentoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DocumentoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDocumentos::route('/'),
            'create' => CreateDocumento::route('/create'),
            'view' => ViewDocumento::route('/{record}'),
            'edit' => EditDocumento::route('/{record}/edit'),
        ];
    }
}
