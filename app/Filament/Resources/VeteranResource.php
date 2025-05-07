<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VeteranResource\Pages;
use App\Filament\Resources\VeteranResource\RelationManagers;
use App\Models\Veteran;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentLexicalEditor\Enums\ToolbarItem;
use Malzariey\FilamentLexicalEditor\FilamentLexicalEditor;

class VeteranResource extends Resource
{
    protected static ?string $model = Veteran::class;

    protected static ?string $navigationLabel = 'Ветераны';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            SpatieMediaLibraryFileUpload::make('cover')
                                ->collection('cover')
                                ->label('Обложка')
                                ->imagePreviewHeight('250')
                                ->loadingIndicatorPosition('left')
                                ->panelAspectRatio('2:1')
                                ->panelLayout('integrated')
                                ->removeUploadedFileButtonPosition('right')
                                ->uploadButtonPosition('left')
                                ->image()
                                ->imageEditor()
                                ->imageEditorMode(2)
                                ->uploadProgressIndicatorPosition('left'),
                            Forms\Components\Grid::make()->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->label('Имя')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('surname')
                                    ->required()
                                    ->label('Фамилия')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('thirdname')
                                    ->label('Отчество')
                                    ->maxLength(255),
                            ])->columns(1)->columnSpan(2)
                        ])->columns(3),
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Select::make('company_id')
                                ->relationship('company', 'name')
                                ->label('Предприятие')
                                ->required(),
                            Forms\Components\TextInput::make('birth_dt')
                                ->label('Дата рождения')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('death_dt')
                                ->label('Дата смерти')
                                ->maxLength(255),
                        ])->columns(3),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(10)
                            ->required(),
                        Forms\Components\TextInput::make('position')
                            ->label('Профессия')
                            ->maxLength(255),
                        Forms\Components\Section::make('Таймлайн')->schema([
                            Forms\Components\Builder::make('timeline')->blocks([
                                Block::make('general')->schema([
                                    TextInput::make('period')->label('Период')->required(),
                                    Forms\Components\Textarea::make('desc')->label('Описание')->required(),
                                ])->label('Стандартный блок')->columns(2),
                                Block::make('big_block')->schema([
                                    FilamentLexicalEditor::make('text')
                                        ->enabledToolbars([
                                            ToolbarItem::CLEAR, ToolbarItem::QUOTE,
                                            ToolbarItem::BOLD, ToolbarItem::ITALIC, ToolbarItem::UNDERLINE,
                                            ToolbarItem::LINK, ToolbarItem::TEXT_COLOR
                                        ]),
                                ])->label('Большой блок')
                            ])->addActionLabel('Добавить блок')->label('')->collapsible(),
                        ]),
                        Forms\Components\Section::make('Медиа')->schema([
                            Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                                ->collection('gallery')
                                ->image()
                                ->multiple()
                                ->reorderable()
                                ->imageEditor()
                                ->label('Галерея')
                                ->panelLayout('grid')
                                ->imageEditorMode(2)
                                ->imageResizeMode('cover'),
                            Forms\Components\SpatieMediaLibraryFileUpload::make('medals')
                                ->collection('medals')
                                ->image()
                                ->multiple()
                                ->imageEditor()
                                ->reorderable()
                                ->panelLayout('grid')
                                ->label('Медали')
                                ->imageEditorMode(2)
                                ->imageResizeMode('cover'),
                        ])->collapsible()
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->label('Фамилия')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thirdname')
                    ->label('Отчество')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->searchable()
                    ->label('Предприятие')
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Профессия')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_dt')
                    ->label('Дата рождения')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('death_dt')
                    ->label('Дата смерти')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Дата создания'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Дата обновления')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListVeterans::route('/'),
            'create' => Pages\CreateVeteran::route('/create'),
            'edit' => Pages\EditVeteran::route('/{record}/edit'),
        ];
    }
}
