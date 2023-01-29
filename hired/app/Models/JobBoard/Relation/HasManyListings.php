<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait HasManyListings
{
    public static $REL_LISTINGS = 'listings';

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
