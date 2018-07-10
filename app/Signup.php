<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class signup extends Model
{

    use Notifiable;

    protected $fillable = [
      'username',
      'event_id',
      'comment',
    ];

}
