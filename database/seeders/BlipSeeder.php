<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Blip::factory()->count(50)->create();
    }
}
