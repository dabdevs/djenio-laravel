<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The users that belong to the Country
     *
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
