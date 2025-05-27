<?php

namespace App\Filament\Dashboard\Resources;

use App\Filament\Resources\Customer\ExpensesResource\RelationManagers\ExpensesRelationManager;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Menu';

    public static function getModelLabel(): string
    {
        return __('Customer');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'md' => 3
                ])->schema([
                    Forms\Components\TextInput::make('code')
                        ->translateLabel()
                        ->required()
                        ->disabled()
                        ->maxLength(20),
                    Forms\Components\TextInput::make('name')
                        ->translateLabel()
                        ->required()
                        ->maxLength(100)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('email')
                        ->translateLabel()
                        ->required()
                        ->email()
                        ->maxLength(100),
                    Forms\Components\TextInput::make('phone')
                        ->translateLabel()
                        ->required()
                        ->maxLength(15),
                    Forms\Components\TextInput::make('document')
                        ->translateLabel(),
                    Forms\Components\TextInput::make('address')
                        ->translateLabel()
                        ->required()
                        ->maxLength(100)
                        ->columnSpanFull(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->translateLabel()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->translateLabel()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone')->translateLabel()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s')
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //ExpensesRelationManager::class,
            // Outros relation managers se necessário
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Dashboard\Resources\CustomerResource\Pages\ListCustomers::route('/'),
            'create' => \App\Filament\Dashboard\Resources\CustomerResource\Pages\CreateCustomer::route('/create'),
            'edit' => \App\Filament\Dashboard\Resources\CustomerResource\Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
