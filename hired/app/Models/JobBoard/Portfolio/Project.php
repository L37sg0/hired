<?php

namespace App\Models\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Project extends Model implements ProjectFields
{
    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
