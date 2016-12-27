<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class listCourse extends Model
{
    protected $table = "course";

    protected $fillable = ['course', 'req_hours', 'hrs_per_day', 'days', 'sched', 'fee'];

    protected $hidden = [];
}
