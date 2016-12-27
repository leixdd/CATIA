<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\settings;

class Updatesettings extends Command implements SelfHandling
{
    public $id;
    public $value;

    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function handle()
    {
        return settings::where('id', $this->id)->update(array(
            'setting_value' => $this->value
        ));
    }
}
