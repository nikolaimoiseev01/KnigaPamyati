<?php

namespace App\Filament\Resources\FederalDistrictResource\Pages;

use App\Filament\Resources\FederalDistrictResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFederalDistrict extends EditRecord
{
    protected static string $resource = FederalDistrictResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return $this->record['surname'] . ' ' . $this->record['name'];
    }
}
