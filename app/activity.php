<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
  protected $fillable = [
    'action_type', 'ip', 'amount', 'value', 'created_at', 'updated_at'
  ];
}
