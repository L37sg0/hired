<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Portfolio\Portfolio;

trait BelongsToPortfolio
{
    /**
     * @var string
     */
    public static $REL_PORTFOLIO = 'portfolio';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

}
