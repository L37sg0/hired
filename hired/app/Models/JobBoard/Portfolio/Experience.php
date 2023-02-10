<?php

namespace App\Models\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model implements ExperienceFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $casts    = self::CASTS;
}
