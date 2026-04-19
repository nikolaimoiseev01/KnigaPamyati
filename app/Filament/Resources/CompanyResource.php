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
use App\Filament\Resources\CompanyResource\Pages\ListCompanies;
use App\Filament\Resources\CompanyResource\Pages\CreateCompany;
use App\Filament\Resources\CompanyResource\Pages\EditCompany;
use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
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

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Предприятия';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
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
                                ->uploadProgressIndicatorPosition('left'),
                            Grid::make()->schema([
                                Grid::make()->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->label('Название')
                                        ->maxLength(255),
                                    Select::make('federal_district_id')
                                        ->relationship('federal_district', 'name')
                                        ->label('Округ')
                                        ->required()
                                ]),
                                Grid::make()->schema([
                                    TextInput::make('date_start')
                                        ->required()
                                        ->label('Время начала работы')
                                        ->maxLength(255),
                                    TextInput::make('date_end')
                                        ->required()
                                        ->label('Время окончания работы')
                                        ->maxLength(255),
                                ]),
                            ])->columns(1)->columnSpan(2)
                        ])->columns(3),
                        Textarea::make('description')
                            ->label('Описание')
                            ->rows(10)
                            ->required(),
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
                        SpatieMediaLibraryFileUpload::make('gallery')
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
                            ->columnSpan(['lg' => 1]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('federal_district.name')
                    ->numeric()
                    ->label('Федеральный округ')
                    ->sortable(),
                TextColumn::make('date_start')
                    ->label('Время начала работы')
                    ->searchable(),
                TextColumn::make('date_end')
                    ->label('Время окончания работы')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Дата обновления')
                    ->dateTime()
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
            'index' => ListCompanies::route('/'),
            'create' => CreateCompany::route('/create'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }
}
