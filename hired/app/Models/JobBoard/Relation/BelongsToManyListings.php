<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait BelongsToManyListings
{
    public static $REL_LISTINGS = 'listings';

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
