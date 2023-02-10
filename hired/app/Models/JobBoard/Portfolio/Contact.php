<?php

namespace App\Models\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model implements ContactFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $casts    = self::CASTS;
}
