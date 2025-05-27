<?php

namespace App\Filament\Dashboard\Resources;

use App\Filament\Resources\ToolCategoriesResource\Pages;
use App\Filament\Resources\ToolCategoriesResource\RelationManagers;
use App\Models\ToolCategories;
use App\Models\ToolCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ToolCategoriesResource extends Resource
{
    protected static ?string $model = ToolCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administración';

    protected static ?int $navigationSort = 13;

    public static function getModelLabel(): string
    {
        return __('Tool category');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->translateLabel()
                ->required(),
                Forms\Components\RichEditor::make('description')
                    ->translateLabel()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => \App\Filament\Dashboard\Resources\ToolCategoriesResource\Pages\ListToolCategories::route('/'),
            'create' => \App\Filament\Dashboard\Resources\ToolCategoriesResource\Pages\CreateToolCategories::route('/create'),
            'edit' => \App\Filament\Dashboard\Resources\ToolCategoriesResource\Pages\EditToolCategories::route('/{record}/edit'),
        ];
    }
}
