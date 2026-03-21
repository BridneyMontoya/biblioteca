<?php

namespace App\Filament\Resources\Libros;

use App\Filament\Resources\Libros\Pages\CreateLibro;
use App\Filament\Resources\Libros\Pages\EditLibro;
use App\Filament\Resources\Libros\Pages\ListLibros;
use App\Filament\Resources\Libros\Schemas\LibroForm;
use App\Filament\Resources\Libros\Tables\LibrosTable;
use App\Models\Libro;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LibroResource extends Resource
{
    protected static ?string $model = Libro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'titulo';

    protected static UnitEnum|string|null $navigationGroup = 'Atenciones';

    public static function form(Schema $schema): Schema
    {
        return LibroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LibrosTable::configure($table);
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
            'index' => ListLibros::route('/'),
            'create' => CreateLibro::route('/create'),
            'edit' => EditLibro::route('/{record}/edit'),
        ];
    }
}
