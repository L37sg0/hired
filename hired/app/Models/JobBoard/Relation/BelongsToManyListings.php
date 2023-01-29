<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait BelongsToManyListings
{
    /**
     * @var string
     */
    public static $REL_LISTINGS = 'listings';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
