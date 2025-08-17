<?php

namespace App\Filament\Resources\Atencions\Pages;

use App\Filament\Resources\Atencions\AtencionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAtencions extends ListRecords
{
    protected static string $resource = AtencionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
