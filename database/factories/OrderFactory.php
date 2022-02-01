<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'order_no' => rand(1, 9999999999999),
            'subtotal' => 6565, 
            'total' => 10000, 
            'qty' => rand(1, 10),
            'address' => $this->faker->text(150),
            'user_id' => User::factory(),
        ];
    }
}
