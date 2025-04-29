<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentLexicalEditor\Enums\ToolbarItem;
use Malzariey\FilamentLexicalEditor\FilamentLexicalEditor;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Предприятия';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            SpatieMediaLibraryFileUpload::make('cover')
                                ->collection('cover')
                                ->imagePreviewHeight('250')
                                ->panelLayout('grid')
                                ->loadingIndicatorPosition('left')
                                ->panelAspectRatio('2:1')
                                ->panelLayout('integrated')
                                ->removeUploadedFileButtonPosition('right')
                                ->uploadButtonPosition('left')
                                ->image()
                                ->imageEditor()
                                ->imageEditorMode(2)
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('1:1')
                                ->uploadProgressIndicatorPosition('left'),
                            Forms\Components\Grid::make()->schema([
                                Forms\Components\Grid::make()->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->label('Название')
                                        ->maxLength(255),
                                    Forms\Components\Select::make('federal_district_id')
                                        ->relationship('federal_district', 'name')
                                        ->label('Округ')
                                        ->required()
                                ]),
                                Forms\Components\Grid::make()->schema([
                                    Forms\Components\TextInput::make('date_start')
                                        ->required()
                                        ->label('Время начала работы')
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('date_end')
                                        ->required()
                                        ->label('Время окончания работы')
                                        ->maxLength(255),
                                ]),
                            ])->columns(1)->columnSpan(2)
                        ])->columns(3),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(10)
                            ->required(),
                        Forms\Components\Section::make('Таймлайн')->schema([
                            Forms\Components\Builder::make('timeline')->blocks([
                                Block::make('general')->schema([
                                    TextInput::make('period')->label('Период')->required(),
                                    Forms\Components\Textarea::make('desc')->label('Описание')->required(),
                                ])->label('Стандартный блок')->columns(2),
                                Block::make('big_block')->schema([
                                    FilamentLexicalEditor::make('text')
                                        ->enabledToolbars([
                                            ToolbarItem::UNDO, ToolbarItem::REDO,
                                            ToolbarItem::QUOTE,
                                            ToolbarItem::BOLD, ToolbarItem::ITALIC, ToolbarItem::UNDERLINE,
                                            ToolbarItem::LINK, ToolbarItem::TEXT_COLOR, ToolbarItem::BACKGROUND_COLOR
                                        ]),
                                ])->label('Большой блок')
                            ])->addActionLabel('Добавить блок')->label('')->collapsible(),
                        ]),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                            ->collection('gallery')
                            ->label('Галлерея')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->label('Галерея')
                            ->panelLayout('grid')
                            ->imageEditorMode(2)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->columnSpan(['lg' => 1]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('federal_district.name')
                    ->numeric()
                    ->label('Федеральный округ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_start')
                    ->label('Время начала работы')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_end')
                    ->label('Время окончания работы')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Дата обновления')
                    ->dateTime()
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
