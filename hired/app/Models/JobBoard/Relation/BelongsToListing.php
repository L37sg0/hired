<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait BelongsToListing
{
    public static $REL_LISTING = 'listing';

    public function listing() {
        return $this->belongsTo(Listing::class);
    }
}
