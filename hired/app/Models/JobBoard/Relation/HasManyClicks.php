<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Click;

trait HasManyClicks
{
    public static $REL_CLICKS;

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
