<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Gig\GigPrice;

trait BelongsToPrice
{
    /**
     * @var string
     */
    public static $REL_PRICE = 'price';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function price() {
        return $this->belongsTo(GigPrice::class);
    }
}
