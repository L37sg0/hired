<?php

namespace Database\Factories\JobBoard\Gig;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Gig\Gig as Model;

class GigFactory extends Factory
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
        $title  = 'I will create a ' . $this->faker->title . ' for you.';
        $slug   = strtolower($title);

        return [
//            Model::FIELD_USER_ID    => rand(1,20),
            Model::FIELD_TITLE  => $title,
            Model::FIELD_SLUG   => $slug,
            Model::FIELD_LOGO   => $this->faker->url,
            Model::FIELD_IS_HIGHLIGHTED => rand(0,1),
            Model::FIELD_IS_ACTIVE  => rand(0,1),
            Model::FIELD_CONTENT    => $title . ' ' . $this->faker->sentences(5, true),
        ];
    }
}
