<?php

namespace Database\Factories\JobBoard\Gig;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Gig\GigPrice as Model;

class GigPriceFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Model::class;

    /**
     * @return mixed[]|void
     */
    public function definition()
    {
        return [
//            Model::FIELD_GIG_ID => rand(1,20),
            Model::FIELD_TYPE   => rand(1,3),
            Model::FIELD_DESCRIPTION    => $this->faker->sentence(),
            Model::FIELD_DELIVERY_DAYS  => rand(3,14),
            Model::FIELD_NUMBER_OF_REVISIONS    => rand(1,5),
            Model::FIELD_VALUE  => rand(35,100),
        ];
    }
}
