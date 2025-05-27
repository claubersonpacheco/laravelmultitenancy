<?php

namespace App\Filament\Dashboard\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Menu';

    protected static ?int $navigationSort = 8;

    public static function getModelLabel(): string
    {
        return __('Category');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->columnSpan(1)
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')->columnSpan('2')
                ->translateLabel(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Dashboard\Resources\CategoryResource\Pages\ListCategories::route('/'),
            'create' => \App\Filament\Dashboard\Resources\CategoryResource\Pages\CreateCategory::route('/create'),
            'edit' => \App\Filament\Dashboard\Resources\CategoryResource\Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
