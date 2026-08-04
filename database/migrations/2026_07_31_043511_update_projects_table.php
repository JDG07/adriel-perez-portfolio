<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->string('slug')->unique()->nullable()->after('title');

            $table->text('excerpt')->nullable()->after('thumbnail');

            $table->string('client')->nullable();

            $table->string('year')->nullable();

            $table->string('project_url')->nullable();

            $table->boolean('featured')->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropColumn([
                'slug',
                'excerpt',
                'client',
                'year',
                'project_url',
                'featured',
            ]);

        });
    }
};
