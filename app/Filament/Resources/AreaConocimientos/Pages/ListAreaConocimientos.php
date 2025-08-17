<?php

namespace App\Filament\Resources\AreaConocimientos\Pages;

use App\Filament\Resources\AreaConocimientos\AreaConocimientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAreaConocimientos extends ListRecords
{
    protected static string $resource = AreaConocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
