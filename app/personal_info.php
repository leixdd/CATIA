<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class personal_info extends Model
{
    protected $table = 'personal_info';

    protected $fillable = ['manpower_id', 'sex', 'cv_status', 'emp_status', 'bdate_month', 'bdate_day', 'bdate_year', 'age', 'bplace_city', 'bplace_province', 'bplace_region', 'educ_attain'];

    protected $hidden = [];

    public function manpower_profiles()
    {
        return $this->belongsTo('CATIA\manpower_profile');
    }
}
