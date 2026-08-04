<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteSetting; // Adjust if your model path is different
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Seed Site Settings (Prevents the hero_bg_video null error)
        SiteSetting::create([
            'hero_bg_video' => null, // or provide a default video URL/path
            // Add other required site_settings columns here
        ]);
    }
}