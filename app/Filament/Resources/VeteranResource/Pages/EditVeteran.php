<?php

namespace App\Filament\Resources\VeteranResource\Pages;

use App\Filament\Resources\VeteranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVeteran extends EditRecord
{
    protected static string $resource = VeteranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('veteran_page')->label('Страница ветерана на портале')->url(route('portal.veteran', $this->record), shouldOpenInNewTab: true),
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return $this->record['surname'] . ' ' . $this->record['name'];
    }
}
