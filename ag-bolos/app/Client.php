<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'client';

    protected $fillable = ['email', 'id_profile', 'password'];

    protected $hidden = [
        'password', 'remember_token'
    ];
    public function profile()
    {
        return $this->belongsTo('App\ClientProfile');
    }
}
