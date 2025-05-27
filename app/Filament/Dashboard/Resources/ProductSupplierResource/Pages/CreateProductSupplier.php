<?php

namespace App\Filament\Dashboard\Resources\ProductSupplierResource\Pages;

use App\Filament\Dashboard\Resources\ProductSupplierResource;
use App\Models\ProductSupplier;
use App\Traits\GeneratesAutomaticCode;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateProductSupplier extends CreateRecord
{
    protected static string $resource = ProductSupplierResource::class;

    use GeneratesAutomaticCode;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->translateLabel()
                    ->required()
                    ->default(fn () => $this->generateCode(ProductSupplier::class))
                    ->maxLength(255),
                TextInput::make('name')
                    ->translateLabel()
                    ->required()
                    ->columnSpan(2)
                    ->maxLength(255),
                TextInput::make('email')
                    ->translateLabel()
                    ->email()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->translateLabel()
                    ->tel()
                    ->maxLength(255),
                TextInput::make('service_type')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('address')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('city')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('state')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('zip')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('document')
                    ->translateLabel()
                    ->maxLength(255),
                TextInput::make('bank_account')
                    ->translateLabel()
                    ->maxLength(255),
                Toggle::make('client')
                    ->label('Is client?')
                    ->translateLabel()
                    ->required(),
                TextInput::make('code_client')
                    ->label('Code client')
                    ->translateLabel()
                    ->maxLength(255),
            ]);
    }

    protected function getRedirectUrl(): string
    {
        // Redirecionar para a página de visualização do item recém-criado
        return $this->getResource()::getUrl('index');
    }

}
