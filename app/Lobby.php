<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
  protected $fillable = [
      'type', 'lobby_link', 'rank', 'region', 'type', 'Prime', 'owner_id', 'owner_name', 'owner_url', 'lobby_type'
  ];

  protected $hidden = [
      'remember_token',
  ];
}
