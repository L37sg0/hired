<?php

namespace Database\Factories\JobBoard;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Tag as Model;
use Illuminate\Support\Str;

class TagFactory extends Factory
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
        $name = ucfirst($this->faker->word);

        return [
            Model::FIELD_NAME   => $name,
            Model::FIELD_SLUG   => Str::slug($name)
        ];
    }
}
