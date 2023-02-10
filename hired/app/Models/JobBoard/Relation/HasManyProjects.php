<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Portfolio\Project;

trait HasManyProjects
{
    /**
     * @var string
     */
    public static $REL_PROJECTS = 'projects';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
