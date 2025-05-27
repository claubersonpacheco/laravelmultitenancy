<?php

namespace App\Filament\Dashboard\Resources\ToolCategoriesResource\Pages;

use App\Filament\Dashboard\Resources\ToolCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditToolCategories extends EditRecord
{
    protected static string $resource = ToolCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
