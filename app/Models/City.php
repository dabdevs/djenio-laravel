<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The users that belong to the city
     *
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the country that owns the City
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
