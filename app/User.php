<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'acc_url', 'steamid', 'avatar', 'role_id', 'primaryclan',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
