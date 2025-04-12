<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoResource\Pages;
use App\Filament\Resources\EventoResource\RelationManagers;
use App\Models\Evento;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
use Symfony\Contracts\Service\Attribute\Required;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('path')->label('Capa')
                ->image()
                ->directory('eventos')
                ->imageCropAspectRatio('4:3')
                ->imageEditor(),
                TextInput::make('titulo')->label('Título')
                ->required(),
                Textarea::make('descricao')->label('Descrição')
                ->Required(),
                DateTimePicker::make('data')
                ->seconds(false)
                ->required(),
                TextInput::make('valor')
                ->numeric()
                ->inputMode('decimal'),
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
                ImageColumn::make('path')->label('Capa'),
                TextColumn::make('titulo')->label('Título')
                ->limit(20)
                ->searchable()->sortable(),
                TextColumn::make('descricao')->label('Descrição')
                ->limit(50)
                ->searchable()->sortable(),
                TextColumn::make('data')->dateTime()
                ->searchable()->sortable(),
                TextColumn::make('valor')->money('BRL')
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
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}
