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
     * Get the dj's configurations
     *
     */
    public function configurations()
    {
        return $this->hasOne(Configuration::class);
    }

    /**
     * The genres that belong to the Dj
     *
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function activate()
    {
        $this->active = 1;
        $this->save();
        return true;
    }

    public function deactivate()
    {
        $this->active = 0;
        $this->save();
        return true;
    }
}
