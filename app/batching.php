<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class batching extends Model
{
  protected $table = "batching";

  protected $fillable = ['id', 'batch', 'population', 'tenthActivation'];

  protected $hidden = [];
}
