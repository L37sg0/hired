<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\JobBoard\Relation\HasManyGigs;
use App\Models\JobBoard\Relation\HasManyListings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserFields
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Billable;
    use HasManyListings;
    use HasManyGigs;

    protected $table    = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
    protected $hidden   = self::HIDDEN;
    protected $casts    = self::CASTS;
}
