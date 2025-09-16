<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition()
    {
        return [
            'username'   => $this->faker->userName,
            'password'   => bcrypt('password'),
            'role'       => $this->faker->randomElement(['admin', 'student']),
            'full_name'  => $this->faker->name,
        ];
    }

}
