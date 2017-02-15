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


    public function __construct($id, $batch, $population, $tenthActivation)
    {
        $this->id = $id;
        $this->batch = $batch;
        $this->population = $population;
        $this->tenthActivation = $tenthActivation;

    }

    public function handle()
    {
      return  batching::create([

          'id' => $this->id,
          'batch' => $this->batch,
          'population' => $this->population,
          'tenthActivation' => $this->tenthActivation,

      ]);
    }
}
