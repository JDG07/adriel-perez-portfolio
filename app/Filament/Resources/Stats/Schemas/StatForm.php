<?php

namespace App\Filament\Resources\Stats\Schemas;

use App\Models\Stat;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                Section::make('Statistic Information')
                    ->description('Information displayed in the statistics section of the portfolio.')
                    ->schema([

                        TextInput::make('value')
                            ->label('Statistic Value')
                            ->placeholder('50+')
                            ->required(),

                        TextInput::make('label')
                            ->placeholder('Completed Projects')
                            ->required(),

                    ])
                    ->columnSpan(1),

                Section::make('Display Settings')
                    ->description('Control how this statistic appears.')
                    ->schema([

                        Toggle::make('accent')
                            ->label('Highlight Card')
                            ->helperText('Highlights this statistic with the portfolio accent color.')
                            ->default(false),

                        TextInput::make('order')
                            ->numeric()
                            ->minValue(1)
                            ->default(fn () => Stat::max('order') + 1)
                            ->helperText('Lower numbers appear first.')

                    ])
                    ->columnSpan(1),

            ]);
    }
}