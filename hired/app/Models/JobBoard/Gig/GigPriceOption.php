<?php

namespace App\Models\JobBoard\Gig;

use App\Models\JobBoard\Relation\BelongsToPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigPriceOption extends Model implements GigPriceOptionFields
{
    use HasFactory;
    use BelongsToPrice;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
