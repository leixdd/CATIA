<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\other_info;

class UpdateOtherCommand extends Command implements SelfHandling
{
    // 'manpower_id', 'classification','terms'

    public $manpower_id;
    public $classification;
    public $terms;
    public $course_id;
    public $remBal;

    public function __construct($manpower_id, $classification, $terms, $course_id, $remBal)
    {
        $this->manpower_id = $manpower_id;
        $this->classification = $classification;
        $this->terms = $terms;
        $this->course_id = $course_id;
        $this->remBal = $remBal;
    }

    public function handle()
    {
        return other_info::where('manpower_id', $this->manpower_id)->update(array(
            'manpower_id' => $this->manpower_id,
            'classification' => $this->classification,
            'terms' => $this->terms,
            'course_id' => $this->course_id,
            'remBal' => $this->remBal
        ));
    }
}
