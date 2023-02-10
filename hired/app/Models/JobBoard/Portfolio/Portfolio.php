<?php

namespace App\Models\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model implements PortfolioFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $casts    = self::CASTS;
}
