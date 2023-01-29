<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Listing;

trait BelongsToListing
{
    /**
     * @var string
     */
    public static $REL_LISTING = 'listing';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing() {
        return $this->belongsTo(Listing::class);
    }
}
