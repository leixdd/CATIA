<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class manpower_profile extends Model
{
    protected $table = 'manpower_profile';

    protected $fillable = ['id', 'image_href', 'entry_date', 'last_name', 'first_name', 'middle_name', 'num_street', 'barangay', 'district', 'city', 'province', 'region', 'email', 'contact', 'nationality','payment','cert','course_id', 'batch'];

    protected $hidden = [];

    public function other_infos()
    {
        return $this->hasMany('CATIA\other_info', 'manpower_id');
    }

    public function personal_infos()
    {
        return $this->hasMany('CATIA\personal_info', 'manpower_id');
    }
}
