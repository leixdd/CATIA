<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\other_info;

class DeleteOtherCommand extends Command implements SelfHandling
{
    // 'manpower_id', 'classification','terms'

    public $manpower_id;

    public function __construct($manpower_id)
    {
        $this->manpower_id = $manpower_id;
    }

    public function handle()
    {
        return other_info::where('manpower_id', $this->manpower_id)->delete();
    }
}
