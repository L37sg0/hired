<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            USER::FIELD_NAME                => fake()->name(),
            USER::FIELD_EMAIL               => fake()->unique()->safeEmail(),
            USER::FIELD_EMAIL_VERIFIED_AT   => now(),
            USER::FIELD_PASSWORD            => Hash::make('password'),
            USER::FIELD_REMEMBER_TOKEN      => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            User::FIELD_EMAIL_VERIFIED_AT => null,
        ]);
    }
}
