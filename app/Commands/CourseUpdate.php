<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\Course;

class CourseUpdate extends Command implements SelfHandling
{

    public $course;
    public $short_name;
    public $req_hours;
    public $hrs_per_day;
    public $days;
    public $sched;
    public $fee;
    public $id;

    public function __construct($id, $course, $short_name, $req_hours, $hrs_per_day, $days, $sched, $fee)
    {
        $this->id = $id;
        $this->course = $course;
        $this->short_name = $short_name;
        $this->req_hours = $req_hours;
        $this->hrs_per_day = $hrs_per_day;
        $this->days = $days;
        $this->sched = $sched;
        $this->fee = $fee;
    }

    public function handle()
    {
      return Course::where('id', $this->id)->update(array(
        'course' => $this->course,
        'short_name' => $this->short_name,
        'req_hours' => $this->req_hours,
        'hrs_per_day' => $this->hrs_per_day,
        'days' => $this->days,
        'sched' => $this->sched,
        'fee' => $this->fee
      ));
    }
}
