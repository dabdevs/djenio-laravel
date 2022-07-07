<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    /**
     * Get the dj that owns the configurations
     *
     */
    public function dj()
    {
        return $this->belongsTo(Dj::class);
    }
}
