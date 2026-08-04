<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use App\Models\Client;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->directory('clients'),
                TextInput::make('order')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->default(fn () => Client::max('order') + 1)
                    ->helperText('Lower numbers appear first.'),
            ]);
    }
}