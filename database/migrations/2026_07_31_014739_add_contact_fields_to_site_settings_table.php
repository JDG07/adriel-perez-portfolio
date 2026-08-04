<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->string('contact_heading')->nullable();

            $table->text('contact_description')->nullable();

            $table->string('contact_phone')->nullable();

            $table->string('contact_email')->nullable();

            $table->text('contact_address')->nullable();

            $table->json('social_links')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'contact_heading',
                'contact_description',
                'contact_phone',
                'contact_email',
                'contact_address',
                'social_links',
            ]);

        });
    }
};
