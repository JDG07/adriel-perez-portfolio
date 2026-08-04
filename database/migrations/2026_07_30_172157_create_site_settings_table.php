<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hero_badge')->nullable();

            $table->string('hero_headline')->nullable();

            $table->text('hero_description')->nullable();

            $table->string('hero_image')->nullable();

            $table->string('resume_url')->nullable();

            $table->string('projects_button_text')->default('View Projects');

            $table->string('resume_button_text')->default('Download Resume');

            $table->string('about_heading')->nullable();
            $table->string('about_image')->nullable();

            $table->text('about_paragraph_1')->nullable();
            $table->text('about_paragraph_2')->nullable();
            $table->text('about_paragraph_3')->nullable();

            $table->text('about_tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
