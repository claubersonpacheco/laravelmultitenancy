<?php

namespace App\Filament\Dashboard\Resources\ProductResource\Pages;

use App\Filament\Dashboard\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected static ?string $title = 'Servicios';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New Service')
            ->translateLabel(),
        ];
    }
}
