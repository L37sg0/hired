<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User as Model;

class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Model::class;

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            Model::FIELD_NAME                => $this->faker->firstName . ' ' . $this->faker->lastName,
            Model::FIELD_EMAIL               => $this->faker->unique()->safeEmail(),
            Model::FIELD_EMAIL_VERIFIED_AT   => now(),
            Model::FIELD_PASSWORD            => Hash::make('password'),
            Model::FIELD_REMEMBER_TOKEN      => Str::random(10),
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
            Model::FIELD_EMAIL_VERIFIED_AT => null,
        ]);
    }
}
