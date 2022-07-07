<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'gender',
        'birthdate',
        'country_id',
        'city_id',
        'telephone',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The country that belong to the Country
     *
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the dj associated with the User
     *
     */
    public function dj()
    {
        return $this->hasOne(Dj::class);
    }

    /**
     * Get the events associated with the User
     *
     */
    public function events()
    {
        return $this->hasOne(Event::class);
    }

    /**
     * Return boolean
     *
     */
    public function isDj()
    {
        return $this->dj != null;
    }

    /**
     *
     */
    public function createDj(String $name)
    {
        $dj = Dj::where('name', $name)->first(); 
       
        if ($dj != null) {
            throw new Exception("Dj already exists. Choose another name.", 404);
        }

        $dj = new Dj();
        $dj->name = $name;
        $dj->user_id = $this->id;
        $dj->save();
        
        return $dj;
    }


}
