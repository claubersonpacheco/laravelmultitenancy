<?php

namespace App\Filament\Dashboard\Resources\ProductSupplierResource\Pages;

use App\Filament\Dashboard\Resources\ProductSupplierResource;
use Filament\Resources\Pages\EditRecord;

class EditProductSupplier extends EditRecord
{
    protected static string $resource = ProductSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
