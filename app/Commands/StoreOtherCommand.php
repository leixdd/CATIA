<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\other_info;

class StoreOtherCommand extends Command implements SelfHandling
{
    // 'manpower_id', 'classification','terms'

    public $manpower_id;
    public $classification;
    public $terms;
    public $serial;
    public $remBal;
    public $App_Payment;
    public $exp;

    public function __construct($manpower_id, $classification, $terms, $serial, $remBal, $App_Payment, $exp)
    {
        $this->manpower_id = $manpower_id;
        $this->classification = $classification;
        $this->terms = $terms;
        $this->serial = $serial;
        $this->remBal = $remBal;
        $this->App_Payment = $App_Payment;
        $this->exp = $exp;
    }

    public function handle()
    {
        return other_info::create([

            'manpower_id' => $this->manpower_id,
            'classification' => $this->classification,
            'terms' => $this->terms,
            'serial' => $this->serial,
            'remBal' => $this->remBal,
            'App_Payment' => $this->App_Payment,
            'exp_date' => $this->exp

        ]);
    }
}
