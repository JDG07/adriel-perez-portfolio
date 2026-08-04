<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make('Website')
                    ->columnSpanFull()
                    ->tabs([

                        /*
                        |--------------------------------------------------------------------------
                        | HERO
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Hero')
                            ->icon('heroicon-o-home')
                            ->schema([

                                Section::make('Hero Section')
                                    ->description('Content shown on the top of the homepage.')
                                    ->schema([

                                        TextInput::make('hero_badge')
                                            ->label('Hero Badge')
                                            ->required(),

                                        FileUpload::make('hero_logo')
                                            ->label('Hero Logo')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('hero')
                                            ->helperText('The mark/logo shown in the center of the hero section.'),

                                        TextInput::make('hero_headline')
                                            ->label('Headline')
                                            ->required()
                                            ->columnSpanFull(),


                                        FileUpload::make('hero_bg_video')
                                            ->label('Hero Background (looping video)')
                                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime'])
                                            ->directory('hero/bg')
                                            ->helperText('MP4, WebM, or MOV. Plays on loop at 50% opacity behind the Hero and Clients sections.'),

                                        FileUpload::make('resume_pdf')
                                            ->label('Resume (PDF)')
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->directory('resume'),

                                        TextInput::make('projects_button_text')
                                            ->default('View Projects'),

                                        TextInput::make('resume_button_text')
                                            ->default('Download Resume'),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | ABOUT
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('About')
                            ->icon('heroicon-o-user')
                            ->schema([

                                Section::make('About Section')
                                    ->description('Information about yourself.')
                                    ->schema([

                                        TextInput::make('about_heading')
                                            ->required(),

                                        FileUpload::make('about_image')
                                            ->label('About Image')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('about'),

                                        FileUpload::make('resume_preview')
                                            ->label('Resume Preview')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('resume-preview')
                                            ->helperText('Upload an image of the first page of your resume.'),

                                        RichEditor::make('about_paragraph_1')
                                            ->label('Paragraph 1')
                                            ->columnSpanFull(),

                                        RichEditor::make('about_paragraph_2')
                                            ->label('Paragraph 2')
                                            ->columnSpanFull(),

                                        RichEditor::make('about_paragraph_3')
                                            ->label('Paragraph 3')
                                            ->columnSpanFull(),

                                        TextInput::make('about_tags')
                                            ->helperText('Separate skills with commas'),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | CONTACT
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Contact')
                            ->icon('heroicon-o-envelope')
                            ->schema([

                                Section::make('Contact Information')
                                    ->description('Information displayed on the left side of the Contact section.')
                                    ->schema([

                                        TextInput::make('contact_heading')
                                            ->label('Heading')
                                            ->placeholder('Need more information? Get in touch with us')
                                            ->required()
                                            ->columnSpanFull(),

                                        Textarea::make('contact_description')
                                            ->label('Description')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        TextInput::make('contact_phone')
                                            ->label('Phone Number')
                                            ->tel(),

                                        TextInput::make('contact_email')
                                            ->label('Email Address')
                                            ->email(),

                                        Textarea::make('contact_address')
                                            ->label('Address')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(2),

                                Section::make('Social Links')
                                    ->description('Links displayed in the Contact section.')
                                    ->schema([

                                        TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->url(),

                                        TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->url(),

                                        TextInput::make('behance_url')
                                            ->label('Behance URL')
                                            ->url(),

                                    ])
                                    ->columns(2),

                            ]),

                    ]),

            ]);
    }
}