<?php

namespace App\Filament\Resources\VeteranResource\Pages;

use App\Filament\Resources\VeteranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterans extends ListRecords
{
    protected static string $resource = VeteranResource::class;

    protected static ?string $title = 'Ветераны';

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
