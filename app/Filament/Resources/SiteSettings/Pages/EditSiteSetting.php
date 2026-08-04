<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditSiteSetting extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Changes saved successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }    
}