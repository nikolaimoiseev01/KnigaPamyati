<?php

namespace App\Filament\Resources\FederalDistrictResource\Pages;

use App\Filament\Resources\FederalDistrictResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFederalDistricts extends ListRecords
{
    protected static string $resource = FederalDistrictResource::class;

    protected static ?string $title = 'Федеральные округа';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
