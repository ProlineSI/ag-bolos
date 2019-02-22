<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'client';

    protected $fillable = ['email', 'name', 'password'];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
