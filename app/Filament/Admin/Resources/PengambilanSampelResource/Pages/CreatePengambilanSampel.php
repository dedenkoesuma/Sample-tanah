<?php

namespace App\Filament\Admin\Resources\PengambilanSampelResource\Pages;

use App\Filament\Admin\Resources\PengambilanSampelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action as ActionsAction;
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
