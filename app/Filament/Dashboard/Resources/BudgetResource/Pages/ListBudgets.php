<?php

namespace App\Filament\Dashboard\Resources\BudgetResource\Pages;

use App\Filament\Dashboard\Resources\BudgetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBudgets extends ListRecords
{
    protected static string $resource = BudgetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New Budget')
            ->translateLabel(),
        ];
    }
}
