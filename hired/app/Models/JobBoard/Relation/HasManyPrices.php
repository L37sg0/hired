<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Gig\GigPrice;

trait HasManyPrices
{
    /**
     * @var string
     */
    public static $REL_PRICES = 'prices';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices() {
        return $this->hasMany(GigPrice::class);
    }
}
