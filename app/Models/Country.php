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
        return $this->belongsToMany(User::class, 'country_user_table', 'user_id', 'country_id');
    }
}
