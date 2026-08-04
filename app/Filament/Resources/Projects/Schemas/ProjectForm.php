<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Category;
use App\Models\Project;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([

                Section::make('Project Information')
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('excerpt')
                            ->label('Short Description')
                            ->maxLength(200)
                            ->columnSpanFull(),

                        RichEditor::make('description')
                            ->columnSpanFull(),

                        FileUpload::make('thumbnail')
                            ->label('Project Thumbnail')
                            ->image()
                            ->imageEditor()
                            ->directory('projects/thumbnails')
                            ->required()
                            ->columnSpanFull(),

                    ])
                    ->columns(1)
                    ->columnSpan(2),

                Section::make('Project Settings')
                    ->schema([

                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        TextInput::make('client'),

                        TextInput::make('year'),

                        TextInput::make('project_url')
                            ->url(),

                        Toggle::make('featured')
                            ->default(false),


                        TextInput::make('order')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->default(fn () => Project::max('order') + 1)
                            ->helperText('Lower numbers appear first.'),

                    ])
                    ->columns(1)
                    ->columnSpan(1),

                Section::make('Project Gallery')
                    ->description('Upload multiple screenshots for this project.')
                    ->schema([

                        FileUpload::make('gallery')
                            ->label('Gallery Images')
                            ->multiple()
                            ->maxSize(20480) // 20MB upper boundary
                            // Automatically scale down huge high-res photos
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->imageResizeMode('contain')
                            ->helperText('Maximum file size per image is 20MB.')
                            ->image()
                            ->imageEditor()
                            ->appendFiles()
                            ->reorderable()
                            ->directory('projects/gallery')
                            ->disk('public')
                            ->downloadable()
                            ->openable()
                            ->previewable()
                            ->dehydrated(false)
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),

            ]);
    }
}