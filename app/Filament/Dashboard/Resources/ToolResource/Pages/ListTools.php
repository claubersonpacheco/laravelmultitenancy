<?php

namespace App\Filament\Dashboard\Resources\ToolResource\Pages;

use App\Filament\Dashboard\Resources\ToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTools extends ListRecords
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New Tool')
            ->translateLabel(),
        ];
    }
}
