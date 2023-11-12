<?php

namespace Database\Factories;

use App\Core\SpareParts\SparePart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SparePartFactory extends Factory
{
    protected $model = SparePart::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => $this->faker->unique()->numberBetween(1,100000),
            'designation' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'brand' => $this->faker->name(),
            'price' => $this->faker->randomDigitNotNull(),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
