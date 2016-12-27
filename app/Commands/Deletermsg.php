<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\reply_logs;


class Deletermsg extends Command implements SelfHandling
{
    public $id;



    public function __construct($id)
    {
        $this->id = $id;

    }

    public function handle()
    {
        return reply_logs::where('message_id', $this->id)->delete();
    }
}
