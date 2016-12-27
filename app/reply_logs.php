<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class reply_logs extends Model
{
  protected $table = "reply_logs";

  protected $fillable = ['id','message_id', 'name', 'messagez', 'time_e' , 'email'];

  protected $hidden = [];
}
