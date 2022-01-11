<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(),
            'post_id' =>Post::factory(),
            'user_id' =>User::factory(),
        ];
    }
}
