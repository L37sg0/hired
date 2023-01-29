<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait HasManyListings
{
    /**
     * @var string
     */
    public static $REL_LISTINGS = 'listings';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
