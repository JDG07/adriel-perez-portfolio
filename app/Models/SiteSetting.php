<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [

    // HERO
    'hero_badge',
    'hero_logo',
    'hero_headline',
    'hero_description',
    'hero_image',
    'hero_bg_video',
    'resume_pdf',
    'resume_preview',
    'projects_button_text',
    'resume_button_text',

    // ABOUT
    'about_heading',
    'about_image',
    'about_paragraph_1',
    'about_paragraph_2',
    'about_paragraph_3',
    'about_tags',

    // CONTACT
    'contact_heading',
    'contact_description',
    'contact_phone',
    'contact_email',
    'contact_address',

    'facebook_url',
    'linkedin_url',
    'github_url',
    'instagram_url',
    'behance_url',

    // FOOTER
    'footer_logo',
    'footer_description',
    'footer_copyright',
];

}