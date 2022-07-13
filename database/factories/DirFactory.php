<?php

namespace Database\Factories;

use App\Models\Dir;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dir>
 */
class DirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'user_id' => rand(1,2),
            'title' => fake()->title(),
            'photoURL' => 'storage/images/default.jpg',
        ];
    }
}
