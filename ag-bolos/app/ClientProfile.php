<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{
    protected $fillable = ['name', 'surname', 'cellphone'];
    protected $table = 'client_profile';
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
