<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rrpp extends Authenticatable
{
    use Notifiable;
    protected $guard = 'rrpp';

    protected $fillable = ['email', 'name', 'password'];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
