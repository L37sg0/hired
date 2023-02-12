<?php

namespace App\Models\JobBoard\Portfolio;

use App\Models\JobBoard\Relation\BelongsToPortfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model implements ProjectFields
{
    use HasFactory;
    use BelongsToPortfolio;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
