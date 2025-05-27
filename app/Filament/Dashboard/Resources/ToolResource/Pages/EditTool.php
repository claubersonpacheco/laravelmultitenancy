<?php

namespace App\Filament\Dashboard\Resources\ToolResource\Pages;

use App\Filament\Dashboard\Resources\ToolResource;
use Filament\Resources\Pages\EditRecord;

class EditTool extends EditRecord
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
