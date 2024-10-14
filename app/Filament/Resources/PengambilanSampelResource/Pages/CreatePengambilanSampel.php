<?php

namespace App\Filament\Resources\PengambilanSampelResource\Pages;

use App\Filament\Resources\PengambilanSampelResource;
use App\Models\SampelTanah;
use Filament\Actions;
use Filament\Actions\Action as ActionsAction;
use Filament\Resources\Pages\CreateRecord;

class CreatePengambilanSampel extends CreateRecord
{
    protected static string $resource = PengambilanSampelResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreateFormAction(): ActionsAction
    {
        return parent::getCreateFormAction()
                ->submit(null)
                ->requiresConfirmation()
                ->action(function(){
                    $this->closeActionModal();
                    $this->create();
                });
    }
}
