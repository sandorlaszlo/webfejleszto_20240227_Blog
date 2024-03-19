<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all();
        return [
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(30),
            // 'published_at' => $this->faker->date(),
            'published_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'lead' => $this->faker->paragraph(2),
            'category_id' => $categories->random()->id
        ];
    }
}
