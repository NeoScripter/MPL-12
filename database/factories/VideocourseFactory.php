<?php

namespace Database\Factories;

use App\Models\Videocourse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videocourse>
 */
class VideocourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => 'images/item-' . $this->faker->numberBetween(1, 10) . '.png',
            'description' => $this->faker->realText(200),
            'title' => $this->faker->realText(50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
