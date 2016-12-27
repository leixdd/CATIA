<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class msg extends Model
{
  protected $table = "message";

  protected $fillable = ['id', 'title', 'messagez', 'time_e' , 'email'];

  protected $hidden = [];
}
