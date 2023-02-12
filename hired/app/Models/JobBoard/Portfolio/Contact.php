<?php

namespace App\Models\JobBoard\Portfolio;

use App\Models\JobBoard\Relation\BelongsToPortfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model implements ContactFields
{
    use HasFactory;
    use BelongsToPortfolio;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $casts    = self::CASTS;
}
