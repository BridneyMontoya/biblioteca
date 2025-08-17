<?php

namespace App\Filament\Resources\AreaConocimientos\Pages;

use App\Filament\Resources\AreaConocimientos\AreaConocimientoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAreaConocimiento extends EditRecord
{
    protected static string $resource = AreaConocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
