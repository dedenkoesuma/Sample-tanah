<?php

namespace App\Filament\Admin\Resources\PengambilanSampelResource\Pages;

use App\Filament\Admin\Resources\PengambilanSampelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengambilanSampels extends ListRecords
{
    protected static string $resource = PengambilanSampelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
