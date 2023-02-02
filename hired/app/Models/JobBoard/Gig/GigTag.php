<?php

namespace App\Models\JobBoard\Gig;

use Illuminate\Database\Eloquent\Model;

class GigTag extends Model implements GigTagFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
