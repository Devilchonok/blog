<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [
        'name', 'login', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news() {
        return $this->hasMany(News::class);
    }

}
