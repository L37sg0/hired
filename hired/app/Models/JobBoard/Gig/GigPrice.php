<?php

namespace App\Models\JobBoard\Gig;

use App\Models\JobBoard\Relation\BelongsToGig;
use App\Models\JobBoard\Relation\HasManyOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigPrice extends Model implements GigPriceFields
{
    use HasFactory;
    use BelongsToGig;
    use HasManyOptions;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
