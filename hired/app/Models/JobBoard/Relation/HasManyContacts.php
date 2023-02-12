<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Portfolio\Contact;

trait HasManyContacts
{
    /**
     * @var string
     */
    public static $REL_CONTACTS = 'contacts';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
