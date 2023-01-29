<?php

namespace App\Models\JobBoard;

use App\Models\JobBoard\Relation\BelongsToManyListings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements TagFields
{
    use HasFactory;
    use BelongsToManyListings;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
