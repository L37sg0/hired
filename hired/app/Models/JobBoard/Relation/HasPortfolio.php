<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Portfolio\Portfolio;

trait HasPortfolio
{
    /**
     * @var string
     */
    public static $REL_PORTFOLIO = 'portfolio';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function portfolio()
    {
        return $this->hasOne(Portfolio::class);
    }

}
