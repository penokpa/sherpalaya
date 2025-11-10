<?php

namespace Database\Factories;

use App\Enums\TrekDifficulty;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trek>
 */
class TrekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->city(),
            'description' => $this->faker->paragraph(),
            'duration' => $this->faker->numberBetween(5, 60),  // Example duration (days)
            'grade' => $this->faker->numberBetween(1, 10),
            'starting_ending_point' => $this->faker->city,
            'best_time_for_trek' => $this->faker->word,
            'starting_altitude' => $this->faker->numberBetween(500, 3000),
            'highest_altitude' => $this->faker->numberBetween(4000, 8000),
            'trek_difficulty' => $this->faker->randomElement(TrekDifficulty::class),  // Assuming difficulty levels 1, 2, 3
            'key_highlights' => $this->faker->words(3),
            'costs_include' => $this->faker->words(3),
            'costs_exclude' => $this->faker->words(3),
            'essential_tips' => $this->faker->words(3),
            'cover_image_id' => null, // You can link to an actual image using Curator or another package
            'feature_image_id' => null,
            'is_featured' => false,
        ];
    }

    public function withItineraries(int $count = 3)
    {
        return $this->has(Itinerary::factory()->withDetails()->count($count), 'trek');
    }
}
