<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutoResource\Pages;
use App\Filament\Resources\InstitutoResource\RelationManagers;
use App\Models\Instituto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;

class InstitutoResource extends Resource
{
    protected static ?string $model = Instituto::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = 'Transparência';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('sobre'),

                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('Atas')
                            ->schema([
                                Repeater::make('ata')
                                    ->schema([
                                        TextInput::make('name')->required(),
                                        FileUpload::make('arquivo')->directory('transparencia')->required()
                                    ])
                                    ->columns(1),
                            ]),
                        Tabs\Tab::make('Estatutos')
                            ->schema([
                                Repeater::make('instituto')->label('Estatuto')
                                    ->schema([
                                        TextInput::make('name')->required(),
                                        FileUpload::make('arquivo')->directory('transparencia')->required()
                                    ])
                                    ->columns(1),
                            ]),
                        Tabs\Tab::make('Documentos institucionais')
                            ->schema([
                                Repeater::make('docs')->label('Documentos institucionais')
                                    ->schema([
                                        TextInput::make('name')->required(),
                                        FileUpload::make('arquivo')->directory('transparencia')->required()
                                    ])
                                    ->columns(1)
                            ]),
                    ])
                    ->activeTab(1)

                // Repeater::make('ata')
                //     ->schema([
                //         TextInput::make('name')->required(),
                //         FileUpload::make('arquivo')->directory('transparencia')->required()
                //     ])
                //     ->columns(1),
                // Repeater::make('instituto')->label('Estatuto')
                //     ->schema([
                //         TextInput::make('name')->required(),
                //         FileUpload::make('arquivo')->directory('transparencia')->required()
                //     ])
                //     ->columns(1),
                // Repeater::make('docs')->label('Documentos institucionais')
                //     ->schema([
                //         TextInput::make('name')->required(),
                //         FileUpload::make('arquivo')->directory('transparencia')->required()
                //     ])
                //     ->columns(1)

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sobre')->wrap()->limit(100)
            ])
            ->filters([
                //
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
            'index' => Pages\ListInstitutos::route('/'),
            'create' => Pages\CreateInstituto::route('/create'),
            'edit' => Pages\EditInstituto::route('/{record}/edit'),
        ];
    }
}
