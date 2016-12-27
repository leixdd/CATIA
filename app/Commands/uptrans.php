<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\other_info;

class uptrans extends Command implements SelfHandling
{

    public $manpower_id;
    public $remBal;
    public $App_Payment;

    public function __construct($manpower_id, $remBal, $App_Payment)
    {
        $this->manpower_id = $manpower_id;
        $this->remBal = $remBal;
        $this->App_Payment = $App_Payment;
    }

    public function handle()
    {
        return other_info::where('manpower_id', $this->manpower_id)->update(array(
            'manpower_id' => $this->manpower_id,
            'remBal' => $this->remBal,
            'App_Payment' => $this->App_Payment
        ));
    }
}
