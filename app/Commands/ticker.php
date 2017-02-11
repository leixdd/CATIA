<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\Visitors;

class ticker extends Command implements SelfHandling
{

    public $ip;
    public $id;
    public $visit_date;
    public $visit_time;

    public function __construct($id, $ip, $visit_date, $visit_time)
    {
        $this->id = $id;
        $this->ip = $ip;
        $this->visit_date = $visit_date;
        $this->visit_time = $visit_time;
    }

    public function handle()
    {
      return Visitors::create([

          'id' => $this->id,
          'ip' => $this->ip,
          'visit_date' => $this->visit_date,
          'visit_time' => $this->visit_time 

      ]);
    }
}
