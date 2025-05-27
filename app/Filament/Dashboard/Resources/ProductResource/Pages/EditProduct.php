<?php

namespace App\Filament\Dashboard\Resources\ProductResource\Pages;

use App\Filament\Dashboard\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected static ?string $title = 'Editar Servicio';

}
