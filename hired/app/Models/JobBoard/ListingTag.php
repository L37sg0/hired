<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;

class ListingTag extends Model implements ListingTagFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
