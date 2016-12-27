<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\personal_info;

class StorePersonalCommand extends Command implements SelfHandling
{
    // 'manpower_id', 'sex', 'cv_status', 'emp_status', 'bdate_month', 'bdate_day', 'bdate_year', 'age', 'bplace_city', 'bplace_province', 'bplace_region', 'educ_attain'

    public $manpower_id;
    public $sex;
    public $cv_status;
    public $emp_status;
    public $bdate_month;
    public $bdate_day;
    public $bdate_year;
    public $age;
    public $bplace_city;
    public $bplace_province;
    public $bplace_region;
    public $educ_attain;

    public function __construct($manpower_id, $sex, $cv_status, $emp_status, $bdate_month, $bdate_day, $bdate_year, $age, $bplace_city, $bplace_province, $bplace_region, $educ_attain)
    {
        $this->manpower_id = $manpower_id;
        $this->sex = $sex;
        $this->cv_status = $cv_status;
        $this->emp_status = $emp_status;
        $this->bdate_month = $bdate_month;
        $this->bdate_day = $bdate_day;
        $this->bdate_year = $bdate_year;
        $this->age = $age;
        $this->bplace_city = $bplace_city;
        $this->bplace_province = $bplace_province;
        $this->bplace_region = $bplace_region;
        $this->educ_attain = $educ_attain;
    }

    public function handle()
    {
        return personal_info::create([

            'manpower_id' => $this->manpower_id,
            'sex' => $this->sex,
            'cv_status' => $this->cv_status,
            'emp_status' => $this->emp_status,
            'bdate_month' => $this->bdate_month,
            'bdate_day' => $this->bdate_day,
            'bdate_year' => $this->bdate_year,
            'age' => $this->age,
            'bplace_city' => $this->bplace_city,
            'bplace_province' => $this->bplace_province,
            'bplace_region' => $this->bplace_region,
            'educ_attain' => $this->educ_attain

        ]);
    }
}
