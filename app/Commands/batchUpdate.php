<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\batching;

class batchUpdate extends Command implements SelfHandling
{

    public $id;
    public $tenthActivation;
    public $population;

    public function __construct($id, $tenthActivation, $population)
    {
        $this->id = $id;
        $this->tenthActivation = $tenthActivation;
        $this->population = $population;

    }

    public function handle()
    {
      return batching::where('id', $this->id)->update(array(
        'tenthActivation' => $this->tenthActivation,
        'population' => $this->population
      ));
    }
}
