<?php

namespace App\Filament\Resources\Atencions\Pages;

use App\Filament\Resources\Atencions\AtencionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAtencion extends EditRecord
{
    protected static string $resource = AtencionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
