<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
  protected $table = "visitors";

  protected $fillable = ['ip', 'visit_date', 'visit_time'];
  
}
