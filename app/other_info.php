<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class other_info extends Model
{
    protected $table = 'other_info';

    protected $fillable = ['manpower_id','classification','terms','course_id','serial','remBal', 'App_Payment', 'exp_date'];

    protected $hidden = [];

    public function manpower_profiles()
    {
        return $this->belongsTo('CATIA\manpower_profile');
    }
}
