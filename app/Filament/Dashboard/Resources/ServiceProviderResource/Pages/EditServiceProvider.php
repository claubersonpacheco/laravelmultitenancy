<?php

namespace App\Filament\Dashboard\Resources\ServiceProviderResource\Pages;

use App\Filament\Dashboard\Resources\ServiceProviderResource;
use Filament\Resources\Pages\EditRecord;

class EditServiceProvider extends EditRecord
{
    protected static string $resource = ServiceProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
