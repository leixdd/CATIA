<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\manpower_profile;

class FullPaid extends Command implements SelfHandling
{

    public $is_active;
    public $id;

    public function __construct($id, $is_active)
    {
        $this->id = $id;
        $this->is_active = $is_active;
    }

    public function handle()
    {
        return manpower_profile::where('id', $this->id)->update(array(

            'is_active' => $this->is_active

        ));
    }
}
