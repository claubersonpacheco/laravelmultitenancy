<?php

namespace App\Filament\Dashboard\Resources\ServiceProviderResource\Pages;

use App\Filament\Dashboard\Resources\ServiceProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceProviders extends ListRecords
{
    protected static string $resource = ServiceProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label("New Service Provider")
            ->translateLabel(),
        ];
    }
}
