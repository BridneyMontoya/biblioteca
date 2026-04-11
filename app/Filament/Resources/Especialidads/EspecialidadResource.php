<?php

namespace App\Filament\Resources\Especialidads;

use App\Filament\Resources\Especialidads\Pages\CreateEspecialidad;
use App\Filament\Resources\Especialidads\Pages\EditEspecialidad;
use App\Filament\Resources\Especialidads\Pages\ListEspecialidads;
use App\Filament\Resources\Especialidads\Pages\ViewEspecialidad;
use App\Filament\Resources\Especialidads\Schemas\EspecialidadForm;
use App\Filament\Resources\Especialidads\Schemas\EspecialidadInfolist;
use App\Filament\Resources\Especialidads\Tables\EspecialidadsTable;
use App\Models\Especialidad;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EspecialidadResource extends Resource
{
    protected static ?string $model = Especialidad::class;

    protected static ?string $navigationLabel = 'Especialidades';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static UnitEnum|string|null $navigationGroup = 'Ajustes';

    public static function form(Schema $schema): Schema
    {
        return EspecialidadForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EspecialidadInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EspecialidadsTable::configure($table);
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
            'index' => ListEspecialidads::route('/'),
            'create' => CreateEspecialidad::route('/create'),
            'view' => ViewEspecialidad::route('/{record}'),
            'edit' => EditEspecialidad::route('/{record}/edit'),
        ];
    }
}
