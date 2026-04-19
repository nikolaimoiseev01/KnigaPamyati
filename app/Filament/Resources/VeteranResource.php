<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\VeteranResource\Pages\ListVeterans;
use App\Filament\Resources\VeteranResource\Pages\CreateVeteran;
use App\Filament\Resources\VeteranResource\Pages\EditVeteran;
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
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
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
                            Grid::make()->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Имя')
                                    ->maxLength(255),
                                TextInput::make('surname')
                                    ->required()
                                    ->label('Фамилия')
                                    ->maxLength(255),
                                TextInput::make('thirdname')
                                    ->label('Отчество')
                                    ->maxLength(255),
                            ])->columns(1)->columnSpan(2)
                        ])->columns(3),
                        Grid::make()->schema([
                            Select::make('company_id')
                                ->relationship('company', 'name')
                                ->label('Предприятие')
                                ->required(),
                            TextInput::make('birth_dt')
                                ->label('Дата рождения')
                                ->maxLength(255),
                            TextInput::make('death_dt')
                                ->label('Дата смерти')
                                ->maxLength(255),
                        ])->columns(3),
                        Textarea::make('description')
                            ->label('Описание')
                            ->rows(10)
                            ->required(),
                        TextInput::make('position')
                            ->label('Профессия')
                            ->maxLength(255),
                        Section::make('Таймлайн')->schema([
                            Forms\Components\Builder::make('timeline')->blocks([
                                Block::make('general')->schema([
                                    TextInput::make('period')->label('Период')->required(),
                                    Textarea::make('desc')->label('Описание')->required(),
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
                        Section::make('Медиа')->schema([
                            SpatieMediaLibraryFileUpload::make('gallery')
                                ->collection('gallery')
                                ->image()
                                ->multiple()
                                ->reorderable()
                                ->imageEditor()
                                ->label('Галерея')
                                ->panelLayout('grid')
                                ->imageEditorMode(2)
                                ->imageResizeMode('cover'),
                            SpatieMediaLibraryFileUpload::make('medals')
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
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                TextColumn::make('surname')
                    ->label('Фамилия')
                    ->searchable(),
                TextColumn::make('thirdname')
                    ->label('Отчество')
                    ->searchable(),
                TextColumn::make('company.name')
                    ->searchable()
                    ->label('Предприятие')
                    ->sortable(),
                TextColumn::make('position')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Профессия')
                    ->searchable(),
                TextColumn::make('birth_dt')
                    ->label('Дата рождения')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('death_dt')
                    ->label('Дата смерти')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Дата создания'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Дата обновления')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListVeterans::route('/'),
            'create' => CreateVeteran::route('/create'),
            'edit' => EditVeteran::route('/{record}/edit'),
        ];
    }
}
