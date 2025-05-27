<?php

namespace App\Filament\Dashboard\Resources\BudgetResource\Pages;

use App\Filament\Dashboard\Resources\BudgetResource;
use App\Models\Budget;
use App\Models\Customer;
use App\Traits\GeneratesAutomaticCode;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBudget extends CreateRecord
{
    use GeneratesAutomaticCode;

    protected static string $resource = BudgetResource::class;
    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn() => Auth::user()->id) // Defina uma função para obter o `budget_id` atual
                    ->required(),
                TextInput::make('code')
                    ->label('Código')
                    ->required()
                    ->default(fn () => $this->generateCode(Budget::class))
                    ->maxLength(20),

                Select::make('customer_id')
                    ->label('Client')
                    ->translateLabel()
                    ->relationship('customer', 'name')
                    ->required()
                    ->createOptionForm([
                        TextInput::make('code')
                            ->translateLabel()
                            ->required()
                            ->default(fn () =>
                            $this->generateCode(Customer::class)
                            ) // Define o próximo código como padrão
                            ->maxLength(20),
                        TextInput::make('name')
                            ->translateLabel()
                            ->required()
                            ->unique()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->translateLabel()
                            ->required()
                            ->unique()
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('address')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->searchable()
                    ->preload(),

                TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->translateLabel()
                    ->maxLength(255)
                    ->columnSpan('full'),

                RichEditor::make('description')
                    ->translateLabel()
                    ->maxLength(255)
                    ->columnSpan('full'),


            ]);
    }

    protected function getRedirectUrl(): string
    {
        // Redirecionar para a página de visualização do item recém-criado
        return $this->getResource()::getUrl('items', ['record' => $this->record->getKey()]);
    }
}
