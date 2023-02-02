<?php

namespace Database\Factories\JobBoard\Gig;

use App\Models\JobBoard\Gig\GigPriceOption as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigPriceOptionFactory extends Factory
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
//            Model::FIELD_GIG_PRICE_ID => '',
            Model::FIELD_KEY => $this->faker->word,
            Model::FIELD_VALUE => $this->faker->sentence(3)
        ];
    }
}
