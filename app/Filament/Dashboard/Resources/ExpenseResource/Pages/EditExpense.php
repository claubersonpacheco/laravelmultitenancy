<?php

namespace App\Filament\Dashboard\Resources\ExpenseResource\Pages;

use App\Filament\Dashboard\Resources\ExpenseResource;
use Filament\Resources\Pages\EditRecord;

class EditExpense extends EditRecord
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
