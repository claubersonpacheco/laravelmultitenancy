<?php

namespace App\Filament\Dashboard\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Menu';
    protected static ?int $navigationSort = 9;

    public static function getModelLabel(): string
    {
        return __('Expense');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Dashboard\Resources\ExpenseResource\Pages\ListExpenses::route('/'),
            'create' => \App\Filament\Dashboard\Resources\ExpenseResource\Pages\CreateExpense::route('/create'),
            'edit' => \App\Filament\Dashboard\Resources\ExpenseResource\Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
