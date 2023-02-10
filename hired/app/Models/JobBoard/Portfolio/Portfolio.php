<?php

namespace App\Models\JobBoard\Portfolio;

use App\Models\JobBoard\Relation\BelongsToUser;
use App\Models\JobBoard\Relation\HasManyContacts;
use App\Models\JobBoard\Relation\HasManyExperiences;
use App\Models\JobBoard\Relation\HasManyProjects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model implements PortfolioFields
{
    use HasFactory;
    use BelongsToUser;
    use HasManyContacts;
    use HasManyExperiences;
    use HasManyProjects;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $casts    = self::CASTS;
}
