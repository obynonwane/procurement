<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivityModel extends Model
{
  protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id'
    ];
}
