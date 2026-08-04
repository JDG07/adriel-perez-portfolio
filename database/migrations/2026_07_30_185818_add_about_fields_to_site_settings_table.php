<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->string('about_heading')->nullable();

            $table->string('about_image')->nullable();

            $table->text('about_paragraph_1')->nullable();

            $table->text('about_paragraph_2')->nullable();

            $table->text('about_paragraph_3')->nullable();

            $table->text('about_tags')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'about_heading',
                'about_image',
                'about_paragraph_1',
                'about_paragraph_2',
                'about_paragraph_3',
                'about_tags',
            ]);

        });
    }
};