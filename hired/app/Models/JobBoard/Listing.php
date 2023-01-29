<?php

namespace App\Models\JobBoard;

use App\Models\JobBoard\Relation\BelongsToManyTags;
use App\Models\JobBoard\Relation\BelongsToUser;
use App\Models\JobBoard\Relation\HasManyClicks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model implements ListingFields
{
    use HasFactory;
    use HasManyClicks;
    use BelongsToUser;
    use BelongsToManyTags;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
