<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => $this->faker->randomElement([
                'doctor1.jpg',
                'doctor2.jpg',
                'doctor3.jpg',
                'doctor4.jpg',
            ]),
            'imageable_id' => Doctor::inRandomOrder()->first()->id,
            'imageable_type' => Doctor::class,
        ];
    }
}
