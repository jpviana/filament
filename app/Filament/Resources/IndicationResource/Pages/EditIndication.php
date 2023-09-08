<?php

namespace App\Filament\Resources\IndicationResource\Pages;

use App\Filament\Resources\IndicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndication extends EditRecord
{
    protected static string $resource = IndicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
