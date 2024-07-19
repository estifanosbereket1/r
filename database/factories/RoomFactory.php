<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amenities = ['WiFi', 'Pool', 'Gym', 'Parking', 'Spa', 'Restaurant', 'Bar', 'Air Conditioning', 'Heating'];

        // Randomly select some amenities
        $selectedAmenities = $this->faker->randomElements($amenities, $this->faker->numberBetween(1, 5));
        return [
            //
            'capacity' => $this->faker->numberBetween(1, 4),
            'pricePerNight' => $this->faker->numberBetween(100, 400),
            'description' => $this->faker->paragraph(5),
            'title' => $this->faker->title(),
            'location' => $this->faker->city(),
            // 'amenities' => json_encode($selectedAmenities)
            'amenities'=>'WiFi, Pool, Gym, Parking, Spa, Restaurant, Bar'
        ];
    }
}
