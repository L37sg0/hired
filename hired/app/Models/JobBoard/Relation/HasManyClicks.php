<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Click;

trait HasManyClicks
{
    /**
     * @var string
     */
    public static $REL_CLICKS = 'clicks';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
