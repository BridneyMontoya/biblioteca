<?php

namespace App\Filament\Resources\AreaConocimientos;

use App\Filament\Resources\AreaConocimientos\Pages\CreateAreaConocimiento;
use App\Filament\Resources\AreaConocimientos\Pages\EditAreaConocimiento;
use App\Filament\Resources\AreaConocimientos\Pages\ListAreaConocimientos;
use App\Filament\Resources\AreaConocimientos\Schemas\AreaConocimientoForm;
use App\Filament\Resources\AreaConocimientos\Tables\AreaConocimientosTable;
use App\Models\AreaConocimiento;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AreaConocimientoResource extends Resource
{
    protected static ?string $model = AreaConocimiento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'AreaConocimiento';

    protected static UnitEnum|string|null $navigationGroup = 'Ajustes';

    public static function form(Schema $schema): Schema
    {
        return AreaConocimientoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreaConocimientosTable::configure($table);
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
            'index' => ListAreaConocimientos::route('/'),
            'create' => CreateAreaConocimiento::route('/create'),
            'edit' => EditAreaConocimiento::route('/{record}/edit'),
        ];
    }
}
