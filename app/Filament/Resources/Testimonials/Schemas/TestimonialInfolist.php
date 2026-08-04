<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Reviewer')
                    ->schema([

                        ImageEntry::make('photo'),

                        TextEntry::make('reviewer_name'),

                        TextEntry::make('occupation'),

                        TextEntry::make('company'),

                        TextEntry::make('location'),

                    ]),

                Section::make('Review')
                    ->schema([

                        TextEntry::make('feedback'),

                        TextEntry::make('rating'),

                        TextEntry::make('active'),

                    ]),

            ]);
    }
}