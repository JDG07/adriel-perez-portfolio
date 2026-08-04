<?php

namespace App\Filament\Resources\Tools\Pages;

use App\Filament\Resources\Tools\ToolResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTool extends CreateRecord
{
    protected static string $resource = ToolResource::class;
   
    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Created successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }
}
