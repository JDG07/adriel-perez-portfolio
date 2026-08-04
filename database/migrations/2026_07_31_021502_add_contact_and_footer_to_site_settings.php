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
                'contact_heading'     => fn () => $table->string('contact_heading')->nullable(),
                'contact_description' => fn () => $table->text('contact_description')->nullable(),
                'contact_phone'       => fn () => $table->string('contact_phone')->nullable(),
                'contact_email'       => fn () => $table->string('contact_email')->nullable(),
                'contact_address'     => fn () => $table->text('contact_address')->nullable(),

                'facebook_url'        => fn () => $table->string('facebook_url')->nullable(),
                'linkedin_url'        => fn () => $table->string('linkedin_url')->nullable(),
                'instagram_url'       => fn () => $table->string('instagram_url')->nullable(),
                'behance_url'         => fn () => $table->string('behance_url')->nullable(),

                'footer_logo'         => fn () => $table->string('footer_logo')->nullable(),
                'footer_description'  => fn () => $table->text('footer_description')->nullable(),
                'footer_copyright'    => fn () => $table->string('footer_copyright')->nullable(),
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