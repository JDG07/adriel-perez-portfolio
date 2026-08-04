<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use App\Models\Testimonial;

use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Reviewer Information
                |--------------------------------------------------------------------------
                */

                Section::make('Reviewer Information')
                    ->description('Please input details.')
                    ->schema([

                        FileUpload::make('photo')
                            ->label('Reviewer Photo')
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->directory('testimonials/reviewers'),

                        TextInput::make('reviewer_name')
                            ->required(),

                        TextInput::make('occupation'),

                        TextInput::make('company'),

                        TextInput::make('location'),

                    ])
                    ->columns(2),

                /*
                |--------------------------------------------------------------------------
                | Testimonial
                |--------------------------------------------------------------------------
                */

                Section::make('Testimonial')
                    ->description('Feedback displayed on the website.')
                    ->schema([

                        Select::make('rating')
                            ->options([
                                5 => '★★★★★ Excellent',
                                4 => '★★★★☆ Very Good',
                                3 => '★★★☆☆ Good',
                                2 => '★★☆☆☆ Fair',
                                1 => '★☆☆☆☆ Poor',
                            ])
                            ->native(false)
                            ->default(5)
                            ->required(),

                        Textarea::make('feedback')
                            ->rows(10)
                            ->required()
                            ->columnSpanFull(),

                    ])
                    ->columns(1),

                /*
                |--------------------------------------------------------------------------
                | Company Branding
                |--------------------------------------------------------------------------
                */

                Section::make('Company Branding')
                    ->schema([

                        FileUpload::make('company_logo')
                            ->image()
                            ->imageEditor()
                            ->directory('testimonials/company-logos'),

                    ]),

                /*
                |--------------------------------------------------------------------------
                | Display Settings
                |--------------------------------------------------------------------------
                */

                Section::make('Display Settings')
                    ->schema([

                        Toggle::make('active')
                            ->label('Publish')
                            ->default(true)
                            ->inline(false)
                            ->helperText('Published testimonials will appear on the portfolio website.'),

                        TextInput::make('order')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->default(fn () => Testimonial::max('order') + 1)
                            ->helperText('Lower numbers appear first.'),

                    ])
                    ->columns(2),

            ]);
    }
}