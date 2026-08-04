<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $columns = [
                'hero_badge'            => fn () => $table->string('hero_badge')->nullable(),
                'hero_headline'         => fn () => $table->string('hero_headline')->nullable(),
                'hero_description'      => fn () => $table->longText('hero_description')->nullable(),
                'hero_image'            => fn () => $table->string('hero_image')->nullable(),
                'resume_pdf'            => fn () => $table->string('resume_pdf')->nullable(),
                'resume_preview'        => fn () => $table->string('resume_preview')->nullable(),
                'projects_button_text'  => fn () => $table->string('projects_button_text')->nullable(),
                'resume_button_text'    => fn () => $table->string('resume_button_text')->nullable(),

                'about_heading'         => fn () => $table->string('about_heading')->nullable(),
                'about_image'           => fn () => $table->string('about_image')->nullable(),
                'about_paragraph_1'     => fn () => $table->longText('about_paragraph_1')->nullable(),
                'about_paragraph_2'     => fn () => $table->longText('about_paragraph_2')->nullable(),
                'about_paragraph_3'     => fn () => $table->longText('about_paragraph_3')->nullable(),
                'about_tags'            => fn () => $table->text('about_tags')->nullable(),

                'contact_heading'       => fn () => $table->string('contact_heading')->nullable(),
                'contact_description'   => fn () => $table->text('contact_description')->nullable(),
                'contact_phone'         => fn () => $table->string('contact_phone')->nullable(),
                'contact_email'         => fn () => $table->string('contact_email')->nullable(),
                'contact_address'       => fn () => $table->text('contact_address')->nullable(),

                'facebook_url'          => fn () => $table->string('facebook_url')->nullable(),
                'linkedin_url'          => fn () => $table->string('linkedin_url')->nullable(),
                'github_url'            => fn () => $table->string('github_url')->nullable(),
                'instagram_url'         => fn () => $table->string('instagram_url')->nullable(),
                'behance_url'           => fn () => $table->string('behance_url')->nullable(),

                'footer_logo'           => fn () => $table->string('footer_logo')->nullable(),
                'footer_description'    => fn () => $table->text('footer_description')->nullable(),
                'footer_copyright'      => fn () => $table->string('footer_copyright')->nullable(),
            ];

            foreach ($columns as $name => $add) {
                if (! Schema::hasColumn('site_settings', $name)) {
                    $add();
                }
            }

        });
    }

    public function down(): void
    {
        //
    }
};