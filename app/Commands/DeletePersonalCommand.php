<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\personal_info;

class DeletePersonalCommand extends Command implements SelfHandling
{
    // 'manpower_id', 'sex', 'cv_status', 'emp_status', 'bdate_month', 'bdate_day', 'bdate_year', 'age', 'bplace_city', 'bplace_province', 'bplace_region', 'educ_attain'

    public $manpower_id;

    public function __construct($manpower_id)
    {
        $this->manpower_id = $manpower_id;
    }

    public function handle()
    {
        return personal_info::where('manpower_id', $this->manpower_id)->delete();
    }
}
