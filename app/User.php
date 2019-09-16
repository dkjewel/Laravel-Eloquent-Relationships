<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'create_at', 'updated_at'
    ];


    //hasOne Relationship
    function phone()
    {
        return $this->hasOne(Phone::class);
    }

    //hasMany Relationship
    function posts()
    {
        return $this->hasMany(Post::class);
    }


}
