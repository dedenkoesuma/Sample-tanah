<?php

namespace App\Filament\Resources\PengambilanSampelResource\Pages;

use App\Filament\Resources\PengambilanSampelResource;
use App\Models\SampelTanah;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPengambilanSampels extends ListRecords
{
    protected static string $resource = PengambilanSampelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label(__('Tambah Sampel'))
        ];
    }
}
