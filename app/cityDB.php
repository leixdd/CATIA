<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class cityDB extends Model
{
    protected $table = 'refcitymun';

    protected $fillable = ['id', 'psgcCode', 'citymunDesc', 'regDesc', 'provCode', 'citymunCode'];

    protected $hidden = [];
}
