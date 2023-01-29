<?php

namespace App\Models;

use App\Models\JobBoard\Relation\HasUser;
use Illuminate\Database\Eloquent\Model;

class Config extends Model implements ConfigFields
{
    use HasUser;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
