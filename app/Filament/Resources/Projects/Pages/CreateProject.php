<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\ProjectImage;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $gallery = $data['gallery'] ?? [];

        unset($data['gallery']);

        $this->galleryImages = $gallery;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Created successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $gallery = $this->data['gallery'] ?? [];

        foreach (array_values($gallery) as $index => $image) {

            ProjectImage::create([
                'project_id' => $this->record->id,
                'image' => $image,
                'order' => $index + 1,
            ]);

        }
    }
}