<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\batching;

class batchingTick extends Command implements SelfHandling
{

    public $id;
    public $batch;
    public $population;
    public $tenthActivation;
    public $course_id;


    public function __construct($id, $batch, $population, $tenthActivation, $course_id)
    {
        $this->id = $id;
        $this->batch = $batch;
        $this->population = $population;
        $this->tenthActivation = $tenthActivation;
        $this->course_id = $course_id;

    }

    public function handle()
    {
      return  batching::create([

          'id' => $this->id,
          'batch' => $this->batch,
          'population' => $this->population,
          'tenthActivation' => $this->tenthActivation,
          'course_id' => $this->course_id

      ]);
    }
}
