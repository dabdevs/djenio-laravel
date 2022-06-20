<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The djs that play the genre
     *
     */
    public function djs()
    {
        return $this->belongsToMany(Dj::class);
    }
}
