<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use App\Filament\Resources\FederalDistrictResource\Pages\ListFederalDistricts;
use App\Filament\Resources\FederalDistrictResource\Pages\CreateFederalDistrict;
use App\Filament\Resources\FederalDistrictResource\Pages\EditFederalDistrict;
use App\Filament\Resources\FederalDistrictResource\Pages;
use App\Filament\Resources\FederalDistrictResource\RelationManagers;
use App\Models\FederalDistrict;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FederalDistrictResource extends Resource
{
    protected static ?string $model = FederalDistrict::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'Федеральные округа';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('name')
                        ->label('Название')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->disabled()
                        ->required()
                        ->maxLength(255),
                    Textarea::make('description')
                        ->label('Описание'),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
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
            'index' => ListFederalDistricts::route('/'),
            'create' => CreateFederalDistrict::route('/create'),
            'edit' => EditFederalDistrict::route('/{record}/edit'),
        ];
    }
}
