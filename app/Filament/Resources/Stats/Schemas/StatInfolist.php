<?php

namespace App\Filament\Resources\Stats\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StatInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('value'),
                TextEntry::make('label'),
                IconEntry::make('accent')->boolean(),
                TextEntry::make('order'),
            ]);
    }
}