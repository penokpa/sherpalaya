<?php

namespace Database\Factories;

use App\Enums\ItineraryType;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItineraryDetail>
 */
class ItineraryDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'itinerary_id' => Itinerary::factory(),  // Associate with an itinerary
            'type' => $this->faker->randomElement(ItineraryType::class),  // Random type from enum
            'description' => $this->faker->paragraph(),  // Random itinerary description
        ];
    }
}
