<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proxy>
 */
class ProxyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ip' => fake()->ipv4(),
            'port' => fake()->numberBetween(0, 65535),
            'login' => fake()->userName(), // password
            'password' => fake()->password(6, 50),
        ];
    }
}
