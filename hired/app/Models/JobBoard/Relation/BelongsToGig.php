<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Gig\Gig;

trait BelongsToGig
{
    /**
     * @var string
     */
    public static $REL_GIG = 'gig';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

}
