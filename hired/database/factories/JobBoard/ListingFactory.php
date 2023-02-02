<?php

namespace Database\Factories\JobBoard;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Listing as Model;
use Illuminate\Support\Str;

class ListingFactory extends Factory
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
        $title      = $this->faker->sentence(rand(5,7));
        $datetime   = $this->faker->dateTimeBetween('-1 month', 'now');

        $content    = '';
        for($i=0; $i<5; $i++) {
            $content .= $this->faker->sentences(rand(5,10), true);
        }

        return [
            Model::FIELD_TITLE          => $title,
            Model::FIELD_SLUG           => Str::slug($title) . '-' . rand(1111,9999),
            Model::FIELD_COMPANY        => $this->faker->company,
            Model::FIELD_LOCATION       => $this->faker->country,
            Model::FIELD_LOGO           => basename($this->faker->image(storage_path('app/public'))),
            Model::FIELD_IS_HIGHLIGHTED => (rand(1,9) > 7),
            Model::FIELD_IS_ACTIVE      => (rand(1, 9) > 4),
            Model::FIELD_CONTENT        => $content,
            Model::FIELD_PRICE_VALUE    => rand(10,1000),
            Model::FIELD_WORKING_HOURS  => rand(10,100),
            Model::FIELD_APPLY_LINK     => $this->faker->url,
            Model::FIELD_CREATED_AT     => $datetime,
            Model::FIELD_UPDATED_AT     => $datetime
        ];
    }
}
