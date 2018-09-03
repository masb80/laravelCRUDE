<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // for relationship between model
    public function posts(){
      return $this->hasMany('App\Post'); // hasMany relationship (user has many posts)
    }
    // for relationship between model
    public function comments(){
      return $this->hasMany('App\Comments'); // hasMany relationship (user has many posts)
    }
}
