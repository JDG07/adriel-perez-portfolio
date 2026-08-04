<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->string('hero_logo')->nullable()->after('hero_badge');

            $table->string('hero_bg_video')->nullable()->after('hero_image');

        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'hero_logo',
                'hero_bg_video',
            ]);

        });
    }
};