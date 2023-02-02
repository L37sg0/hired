<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Gig\GigPriceOption;

trait HasManyOptions
{
    public static $REL_OPTIONS = 'options';

    public function options() {
        return $this->hasMany(GigPriceOption::class);
    }
}
