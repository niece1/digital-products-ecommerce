<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->text(15),
            'slug' => Str::slug($title),
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 10000),
            'stripe_id' => $this->faker->md5(),
            'file_path' => $this->faker->imageUrl(800, 400, 'book'),
        ];
    }
}
