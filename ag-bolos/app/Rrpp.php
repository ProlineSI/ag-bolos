<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rrpp extends Authenticatable
{
    use Notifiable;
    protected $guard = 'rrpp';

    protected $fillable = ['email', 'name', 'password', 'surname', 'cellphone'];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
