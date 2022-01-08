<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->text(50), 
            'body' => $this->faker->text(150), 
            'category_id' =>Category::factory(),
            'user_id' =>User::factory(),
        ];
    }
}
