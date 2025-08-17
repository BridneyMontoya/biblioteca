<?php

namespace App\Filament\Resources\Atencions;

use App\Filament\Resources\Atencions\Pages\CreateAtencion;
use App\Filament\Resources\Atencions\Pages\EditAtencion;
use App\Filament\Resources\Atencions\Pages\ListAtencions;
use App\Filament\Resources\Atencions\Schemas\AtencionForm;
use App\Filament\Resources\Atencions\Tables\AtencionsTable;
use App\Models\Atencion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AtencionResource extends Resource
{
    protected static ?string $model = Atencion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Atencion';

    public static function form(Schema $schema): Schema
    {
        return AtencionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AtencionsTable::configure($table);
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
            'index' => ListAtencions::route('/'),
            'create' => CreateAtencion::route('/create'),
            'edit' => EditAtencion::route('/{record}/edit'),
        ];
    }
}
