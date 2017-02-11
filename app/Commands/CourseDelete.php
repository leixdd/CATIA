<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\Course;


class CourseDelete extends Command implements SelfHandling
{
    public $id;



    public function __construct($id)
    {
        $this->id = $id;

    }

    public function handle()
    {
        return Course::where('id', $this->id)->delete();
    }
}
