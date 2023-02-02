<?php

namespace App\Models\JobBoard\Gig;

use App\Models\JobBoard\Relation\BelongsToManyTags;
use App\Models\JobBoard\Relation\BelongsToUser;
use App\Models\JobBoard\Relation\HasManyClicks;
use App\Models\JobBoard\Relation\HasManyPrices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model implements GigFields
{
    use HasFactory;
    use HasManyClicks;
    use BelongsToUser;
    use BelongsToManyTags;
    use HasManyPrices;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
