<?php

namespace Database\Factories;

use App\Core\Categories\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> fake()->name(),
            "description"=> fake()->realText(),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
