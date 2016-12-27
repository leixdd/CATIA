<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\manpower_profile;

class UpdateAppC extends Command implements SelfHandling
{
    public $id;
    public $account_active;

    public function __construct($id, $account_active)
    {
        $this->id = $id;
        $this->account_active = $account_active;
    }

    public function handle()
    {
        return manpower_profile::where('id', $this->id)->update(array(

            'account_active' => $this->account_active

        ));
    }
}
