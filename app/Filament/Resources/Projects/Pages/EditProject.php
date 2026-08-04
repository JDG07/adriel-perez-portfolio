<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use App\Models\ProjectImage;


class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected array $galleryImages = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['gallery'] = $this->record
            ->images
            ->pluck('image')
            ->toArray();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title('Changes saved successfully!')
            ->success()
            ->send();

        return static::getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        $gallery = $this->data['gallery'] ?? [];

        if (count($gallery)) {

            $this->record->images()->delete();

            foreach (array_values($gallery) as $index => $image) {

                ProjectImage::create([
                    'project_id' => $this->record->id,
                    'image' => $image,
                    'order' => $index + 1,
                ]);

            }
        }
    }

    protected function getHeaderActions(): array
    {
        return [

            ViewAction::make(),

            DeleteAction::make(),

        ];
    }
}