<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;
//reserve codes
class ann_ extends Model
{
  protected $table = "ann_";

  protected $fillable = ['id', 'title', 'content', 'author', 'is_active'];
}
