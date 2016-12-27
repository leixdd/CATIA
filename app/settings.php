<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
  protected $table = 'settings';

  protected $fillable = ['id', 'setting_name', 'setting_value'];

  protected $hidden = [];
}
