<?php

namespace Database\Factories;

use App\Models\ItineraryDetail;
use App\Models\Trek;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itinerary>
 */
class ItineraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'itinerable_id' => Trek::factory(), // Associate with a trek
            'itinerable_type' => Trek::class, // Associate with a trek
            'title' => $this->faker->words(3, true),  // Example itinerary title
        ];
    }
    public function withDetails(int $count = 3)
    {
        return $this->has(ItineraryDetail::factory()->count($count), 'itinerary');
    }
}
