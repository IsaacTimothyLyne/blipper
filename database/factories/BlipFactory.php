<?php

namespace Database\Factories;

use App\Models\Blip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blip>
 */
class BlipFactory extends Factory
{
    protected $model = Blip::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'message' => fake()->text(255),
            'created_at' => now(),
        ];
    }
}
