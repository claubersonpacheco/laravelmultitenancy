<?php

namespace App\Filament\Dashboard\Resources\ToolCategoriesResource\Pages;

use App\Filament\Dashboard\Resources\ToolCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListToolCategories extends ListRecords
{
    protected static string $resource = ToolCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label("New Category Tool")
            ->translateLabel(),
        ];
    }
}
