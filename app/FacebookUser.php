<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class FacebookUser extends Authenticatable
{

  use Notifiable;

  protected $table = 'facebook_users';

  protected $fillable = [
    'facebook_id',
    'name',
    'email',
    'avatar'
  ];


}
