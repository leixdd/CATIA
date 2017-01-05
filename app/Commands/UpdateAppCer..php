<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\manpower_profile;

class UpdateAppCer extends Command implements SelfHandling
{
    public $id;
    public $cert;

    public function __construct($id, $cert)
    {
        $this->id = $id;
        $this->cert = $cert;
    }

    public function handle()
    {
        return manpower_profile::where('id', $this->id)->update(array(

            'cert' => $this->cert

        ));
    }
}
