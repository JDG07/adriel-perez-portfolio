<?php

namespace App\Filament\Resources\Tools\Schemas;

use App\Models\Tool;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ToolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                Section::make('Tool Information')
                    ->description('Information about the technology or software.')
                    ->schema([

                        FileUpload::make('icon')
                            ->label('Tool Logo')
                            ->image()
                            ->imageEditor()
                            ->directory('tools')
                            ->required(),

                        TextInput::make('name')
                            ->label('Tool Name')
                            ->placeholder('Laravel')
                            ->required(),

                        Textarea::make('label')
                            ->label('Description')
                            ->rows(4)
                            ->placeholder('PHP Framework')
                            ->columnSpanFull()
                            ->required(),

                    ])
                    ->columnSpan(1),

                Section::make('Display Settings')
                    ->description('Configure how this tool appears.')
                    ->schema([

                        TextInput::make('order')
                            ->numeric()
                            ->minValue(1)
                            ->default(fn () => Tool::max('order') + 1)
                            ->helperText('Lower numbers appear first.')

                    ])
                    ->columnSpan(1),

            ]);
    }
}