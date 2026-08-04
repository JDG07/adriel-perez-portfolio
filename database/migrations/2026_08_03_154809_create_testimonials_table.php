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
        Schema::create('testimonials', function (Blueprint $table) {

            $table->id();

            $table->string('reviewer_name');

            $table->string('occupation')->nullable();

            $table->string('company')->nullable();

            $table->string('location')->nullable();

            $table->string('photo')->nullable();

            $table->string('company_logo')->nullable();

            $table->text('feedback');

            $table->unsignedTinyInteger('rating')->default(5);

            $table->integer('order')->default(0);

            $table->boolean('active')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
