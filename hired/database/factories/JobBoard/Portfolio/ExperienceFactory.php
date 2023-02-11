<?php

namespace Database\Factories\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Portfolio\Experience as Model;

class ExperienceFactory extends Factory
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
        $startDate  = $this->faker->date();
        $endDate    = date('Y-m-d', strtotime($startDate . "+1 Year"));

        return [
            Model::FIELD_START_DATE     => $startDate,
            Model::FIELD_END_DATE       => $endDate,
            Model::FIELD_COMPANY        => $this->faker->company,
            Model::FIELD_DESCRIPTION    => $this->faker->sentence(10, true),
        ];
    }
}
