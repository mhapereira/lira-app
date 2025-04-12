<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunicadoResource\Pages;
use App\Filament\Resources\ComunicadoResource\RelationManagers;
use App\Models\Comunicado;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComunicadoResource extends Resource
{
    protected static ?string $model = Comunicado::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')->label('Título')->required(),
                Textarea::make('descricao')->label('Descrição')
                ->required(),
                Select::make('status')
                ->options([
                    'ativo' => 'Ativo',
                    'inativo' => 'Inativo',
                ])->default('ativo')->required()
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->label('Título')
                ->limit(20)
                ->searchable()->sortable(),
                TextColumn::make('descricao')->label('Descrição')
                ->limit(50)
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
            'index' => Pages\ListComunicados::route('/'),
            'create' => Pages\CreateComunicado::route('/create'),
            'edit' => Pages\EditComunicado::route('/{record}/edit'),
        ];
    }
}
