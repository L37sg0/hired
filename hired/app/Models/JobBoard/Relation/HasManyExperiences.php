<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Portfolio\Experience;

trait HasManyExperiences
{
    /**
     * @var string
     */
    public static $REL_EXPERIENCES = 'experiences';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

}
