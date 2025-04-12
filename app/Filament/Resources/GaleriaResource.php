<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriaResource\Pages;
use App\Filament\Resources\GaleriaResource\RelationManagers;
use App\Models\Galeria;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriaResource extends Resource
{
    protected static ?string $model = Galeria::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FileUpload::make('path')->label('Imagem')
            ->directory('galeria')
            ->multiple()
            ->required(),
            TextInput::make('descricao')->label('Evento')
            ->required(),
            Select::make('status')
                ->options([
                    'ativo' => 'Ativo',
                    'inativo' => 'Inativo', 
                ])->default('ativo')->required(),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('descricao')->label('Evento')
                ->limit(50)
                ->searchable()->sortable(),
                ImageColumn::make('path')->label('Imagem')
                ->stacked()
                ->limit(5)
                ->searchable()->sortable(),
                SelectColumn::make('status')
                ->options([
                    'ativo' => 'Ativo',
                    'inativo' => 'Inativo',
                ])->rules(['required'])
                ->searchable()->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                ->options([
                    'ativo' => 'Ativo',
                    'inativo' => 'Inativo',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListGalerias::route('/'),
            'create' => Pages\CreateGaleria::route('/create'),
            'edit' => Pages\EditGaleria::route('/{record}/edit'),
        ];
    }
}
