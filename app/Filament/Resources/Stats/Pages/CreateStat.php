<?php

namespace App\Filament\Resources\Stats\Pages;

use App\Filament\Resources\Stats\StatResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateStat extends CreateRecord
{
    protected static string $resource = StatResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Created successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }
}