<?php

namespace App\Filament\Resources\Clients\Pages;


use App\Filament\Resources\Clients\ClientResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Created successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }
}