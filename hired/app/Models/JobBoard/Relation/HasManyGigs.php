<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Gig\Gig;

trait HasManyGigs
{
    /**
     * @var string
     */
    public static $REL_GIGS = 'gigs';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }

}
