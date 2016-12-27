<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\reply_logs;


class Storerep_logs extends Command implements SelfHandling
{
    public $mid;
    public $id;
    public $name;
    public $msg;
    public $time_e;
    public $email;


    public function __construct($mid,$id, $name, $msg, $time_e, $email)
    {
        $this->mid = $mid;
        $this->id = $id;
        $this->name = $name;
        $this->msg = $msg;
        $this->time_e = $time_e;
        $this->email = $email;
    }

    public function handle()
    {
        return reply_logs::create([

            'id' => $this->mid,
            'message_id' => $this->id,
            'name' => $this->name,
            'messagez' => $this->msg,
            'time_e' => $this->time_e,
            'email' => $this->email

        ]);
    }
}
