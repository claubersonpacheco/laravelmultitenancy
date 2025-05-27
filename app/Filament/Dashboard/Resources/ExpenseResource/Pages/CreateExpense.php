<?php

namespace App\Filament\Dashboard\Resources\ExpenseResource\Pages;

use App\Filament\Dashboard\Resources\ExpenseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExpense extends CreateRecord
{
    protected static string $resource = ExpenseResource::class;
}
