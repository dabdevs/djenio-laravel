<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dj extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Dj
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The genres that belong to the Dj
     *
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
