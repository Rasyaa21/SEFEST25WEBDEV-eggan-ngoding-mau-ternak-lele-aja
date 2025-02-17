<?php

namespace App\Filament\Resources\PremiumContentResource\Pages;

use App\Filament\Resources\PremiumContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPremiumContents extends ListRecords
{
    protected static string $resource = PremiumContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
