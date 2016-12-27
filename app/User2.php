<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{

  protected $table = 'users';

  protected $fillable = ['name', 'email', 'password',];

  protected $hidden = ['password', 'remember_token',];
}
